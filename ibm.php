 <?php
 require ( "sphinxapi.php" );

  $cl = new SphinxClient();
  $cl->SetServer( "localhost", 9312 );
  $cl->SetMatchMode( SPH_MATCH_ANY  );
  //$cl->SetFilter( 'model', array( 3 ) );

  $result = $cl->Query( 'Sphinx search service can not start', 'sof' );

  if ( $result === false ) {
      echo "Query failed: " . $cl->GetLastError() . ".\n";
  }
  else {
      if ( $cl->GetLastWarning() ) {
          echo "WARNING: " . $cl->GetLastWarning() . "
";
      }
/*
      if ( ! empty($result["matches"]) ) {
          foreach ( $result["matches"] as $doc => $docinfo ) {
                echo "$doc<br/>";
          }
          echo '<pre>';
          print_r( $result );
		  echo '</pre>';
      }
*/
		echo '<pre>';
          print_r( $result );
		echo '</pre>';
  }
  exit;
?>