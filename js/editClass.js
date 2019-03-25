$(document).ready(function () {
   $('#submitSearch').click(function () {
       $('#download-files').removeClass('hiddenDiv');
       $('#download-files').addClass('unhideDiv');
   });
   $('#resetSearch').click(function () {
       $('#download-files').removeClass('unhideDiv');
       $('#download-files').addClass('hiddenDiv');
   });
});