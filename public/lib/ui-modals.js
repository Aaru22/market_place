var UIModals = function () {
    var initModals = function (url) {    
        var $modal = $('#ajax-modal');           
		$modal.load(url, '', function () {
			$modal.modal();
		});
        $modal.on('click', '.update', function () {
            $modal.modal('loading');
            setTimeout(function () {
                $modal
                    .modal('loading')
                    .find('.modal-body')
                    .prepend('<div class="alert alert-info fade in">' +
                        'Updated!<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                        '</div>');
            }, 1000);
        });
    };
    return {
        init: function (url) {
            initModals(url);           
        }
    };
}();
