// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTable').DataTable({
  	//"paginate": false,
  	 "order": [[2,'desc']],
  });
});
