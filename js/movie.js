(function ($, Drupal) {
  Drupal.behaviors.movie = {
    attach: function (context, settings) {
      var releaseDateField = $('#edit-release-date-0-value-date', context);

      releaseDateField.on('change', function() {
        var selectedDate = new Date(releaseDateField.val());
        var currentDate = new Date();

        if (selectedDate > currentDate) {
          releaseDateField.css('border', '2px solid red');
        } else {
          releaseDateField.css('border', 'none');
        }
      });
    }
  };
})(jQuery, Drupal);
