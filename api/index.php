<?php
//Config Settings

// set up the endpoint and data file names.
// for an end point of "/api/blog/" using the datafile blog.json

//run the main function
operation();

// all of the REST functions
function rest_put(){

}

function rest_post($request){

  $datafile=$request[0] . '.json';
  $dataarrayfile=file_read($datafile);




  if(isset($request[1])){

    // if it is not a number
    if(!is_numeric($request[1])){
      // update error message if desired
      $dataarray=array('id invalid');
    // if it can be found in array
    }else{



      //get both the key and the values
      //$dataarray=array($request[1] => $dataarrayfile[$request[1]]);

      foreach($dataarrayfile as $i) {
        if($i['id'] == $request[1]){
          $dataarray= $i;
        }
      }
    }
    // if it was not found
    if(empty($dataarray)){
      // update error message if desired
      $dataarray=array('id not found');
    }

  }else{
    //if no id was sent send everything
    $dataarray = $dataarrayfile;
  }

  // send data arrau to output function
  output_json($dataarray);

}

function rest_head(){

}

function rest_delete(){

}

function rest_options(){

}

function rest_error(){

}

function action($namespace){

  $querystring = explode('/',$_GET['qs']);

  // add check for item in array
  // assume $querystring[0] is the name of the reqource
  $datafile = $namespace[$querystring[0]] . '.json';

}

// Basic file i/o read
function file_read($datafile){
  // get the Json file use @ to suppress can not open stream error
  $json = @file_get_contents($datafile);

  if($json === FALSE) {

    $json = "[{bad file name}]";
  }

  // turn json into php array
  $array = json_decode($json, true);

  return $array;
}


// Basic file i/o write
function file_write($datafile, $dataarray){
  // open file for writing
  $file = fopen($datafile, 'w') or die("Error opening output file");
  // write file...  if support for non-ASCII is needed, use php 5.4+ json_encode($array,JSON_UNESCAPED_UNICODE)
  fwrite($file, json_encode($dataarray));
  // close the file
  fclose($file);

}

// output json to screen
function output_json($dataarray){

  $out = json_encode($dataarray);
  // set our content-type to json
  header('content-type: application/json; charset=utf-8');
  // enable Cross-Origin Resource Sharing (CORS)
  header("access-control-allow-origin: *");
  // output the json
  echo $out;
  return;
}

function operation(){
  $method = $_SERVER['REQUEST_METHOD'];
  $request = '';
  if(isset($_GET['qs'])){
    $request = explode('/',$_GET['qs']);
  }


  switch ($method) {
    case 'PUT':
      rest_put($request);
      break;
    case 'POST':
      rest_post($request);
      break;
    case 'GET':
      rest_post($request);
      break;
    case 'HEAD':
      rest_head($request);
      break;
    case 'DELETE':
      rest_delete($request);
      break;
    case 'OPTIONS':
      rest_options($request);
      break;
    default:
      rest_error($request);
      break;
  }
}

?>
