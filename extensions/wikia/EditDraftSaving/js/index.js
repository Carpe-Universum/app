define('EditDraftSaving', ['jquery', 'wikia.log', 'wikia.tracker'], function(jquery, logger, tracker) {

	// keep in sync with PHP code in EditDraftSavingHooks.class.php file
	var EDIT_DRAFT_KEY_HIDDEN_FIELD = 'wpEditDraftKey';

	// get MediaWiki edit form
	var editForm = jquery('#editform');

	// was draft conflict triggered?
	var inDraftConflict = false;

	// CORE-110 | initial content that will be used when user discards an edit
	var initialContent;

	/**
	 * @param msg {string}
	 */
	function log(msg) {
		logger(msg, logger.levels.info, 'EditDraftSaving');
	}

	/**
	 * Get a key that will be used by local storage when saving a draft
	 * @returns {string}
	 */
	function getDraftKey() {
		return window.wgPageName + '-draft';
	}

	/**
	 * Save a draft data to local storage
	 * @param draftData {object}
	 */
	function storeDraft(draftData) {
		try {
			localStorage.setItem(
				getDraftKey(),
				JSON.stringify(draftData)
			);
			log('Stored a draft');
		} catch (e) {
			console.error(e);
		}
	}

	/**
	 * Read draft data from local storage
	 * @returns {object}?
	 */
	function readDraft() {
		try {
			log('Reading a draft...');
			return JSON.parse(localStorage.getItem(getDraftKey()));
		} catch (e) {
			console.error(e);
			return null;
		}
	}

	function storeOriginalContent(content) {
		log('Stored original content: ' + content);
		initialContent = content;
	}

	/**
	 * Take edit draft timestamp and check if we're in edit conflict. Handle it accordingly.
	 *
	 * @see CORE-84
	 */
	function checkDraftConflict(draftStartTime, editorType) {
		if (draftStartTime) {
			var wpEdittime = editForm.find('[name="wpEdittime"]').val();

			// restore "wpStarttime" field value in edit form to allow MediaWiki
			// to handle edit conflicts when edit page is submitted
			editForm.find('[name="wpStarttime"]').val(draftStartTime);

			log('Checking conflict - our edit started at "' + draftStartTime + '", ' +
				'the most recent article edit was at "' + wpEdittime + '"');

			// and compare it with the wpEdittime value
			if (draftStartTime < wpEdittime) {
				// Set wpEdittime to a timestamp that is before the current article revision timestamp.
				// This will trigger a condition in EditPage line 1320
				// "# Article exists. Check for edit conflict."
				editForm.find('[name="wpEdittime"]').val(draftStartTime);

				onDraftConflict(editorType);
			}
		}
	}

	/**
	 * Track draft conflict and show the modal with a message saying what just happened
	 */
	function onDraftConflict(editorType) {
		log('Draft conflict for ' + editorType);

		// Wikia.Tracker:  trackingevent editor-ck/impression/draft-conflict/ [analytics track]
		tracker.track({
			trackingMethod: 'analytics',
			action: tracker.ACTIONS.IMPRESSION,
			category: editorType,
			label: 'draft-conflict'
		});

		jquery.showModal(window.wgPageName, window.mediaWiki.message('edit-draft-edit-conflict').text());

		inDraftConflict = true;
	}

	/**
	 * Track draft restore and show the modal with a message saying what just happened
	 */
	function onDraftRestore(editorType, appendTo, onDismiss) {
		log('Restored a draft for ' + editorType);

		// Wikia.Tracker:  trackingevent editor-ck/impression/draft-loaded/ [analytics track]
		tracker.track({
			trackingMethod: 'analytics',
			action: tracker.ACTIONS.IMPRESSION,
			category: editorType,
			label: 'draft-loaded'
		});

		// CORE-84: in case of a conflict, let's only show the conflict notice
		if (!inDraftConflict) {
			jquery(appendTo).append(
				'<div id="draft-restore-message" style="background: green; color: white; padding: 10px;">' +
				window.mediaWiki.message('edit-draft-loaded').text() +
				'<a href="#" class="ok">' + window.mediaWiki.message('ok').text() + '</a>' +
				'<a href="#" class="cancel">' + window.mediaWiki.message('cancel').text() + '</a>' +
				'</div>'
			);

			var bar = $('#draft-restore-message');

			bar.find('.ok').on('click', function() {
				bar.hide();
			});

			bar.find('.cancel').on('click', function() {
				bar.hide();

				log('Dismissing a draft');
				tracker.track({
					trackingMethod: 'analytics',
					action: tracker.ACTIONS.IMPRESSION,
					category: editorType,
					label: 'draft-discard'
				});

				onDismiss(initialContent);
			});
		}

		// bind to editform submit event to track successful edits form draft restore
		editForm.on('submit', function() {
			tracker.track({
				trackingMethod: 'analytics',
				action: tracker.ACTIONS.IMPRESSION,
				category: editorType,
				label: 'draft-publish'
			});
		});
	}

	// store the draft key in the form as a hidden field
	jquery(function () {
		editForm.append(
			jquery('<input>').
				attr('type', 'hidden').
				attr('name', EDIT_DRAFT_KEY_HIDDEN_FIELD).
				attr('value', getDraftKey())
		);
	});

	return {
		SAVES_INTERVAL: 5000, // in [ms]

		log: log,

		checkDraftConflict: checkDraftConflict,
		onDraftRestore: onDraftRestore,

		// getDraftKey: getDraftKey,
		storeDraft: storeDraft,
		readDraft: readDraft,

		storeOriginalContent: storeOriginalContent
	}
});
