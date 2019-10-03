
  
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    var availableTags = [
      "ActionScript",
      "Щука",
      "Asp",
      "BASIC",
      "C",
      "C++",
      "Clojure",
      "COBOL",
      "ColdFusion",
      "Erlang",
      "Fortran",
      "Groovy",
	  <?
	 
	  include('db_sprav.php');
	  $sql_rabotniki_search = $db->query("SELECT * FROM rabotniki ORDER BY famil ASC");
 $db->close;
 while($result_rabotniki_sarch = $sql_rabotniki_search->fetch_assoc()): 
	  echo '"'.$result_rabotniki_sarch['famil'].' '.$result_rabotniki_sarch['name'].' '.$result_rabotniki_sarch['otchestvo'].'",';
	 endwhile;
	  ?>
      "Haskell",
      "Java",
      "JavaScript",
      "Lisp",
      "Perl",
      "PHP",
      "Python",
      "Ruby",
      "Scala",
      "Scheme"
    ];
    $( "#rabotnichki" ).autocomplete({
      source: availableTags
    });
  } );
  </script>


 
  <input id="rabotnichki">
 
 

  
  
  
  
  
  
  
  
  
  
  
