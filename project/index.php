<?php

//turn on debugging messages
ini_set('display_errors', 'On');
error_reporting(E_ALL);


//instantiate the program object

//Class to load classes it finds the file when the progrm starts to fail for calling a missing class
class Manage {
    public static function autoload($class) {
        //you can put any file name or directory here
        include $class . '.php';
    }
}

spl_autoload_register(array('Manage', 'autoload'));

//instantiate the program object
$obj = new main();


class main {

    public function __construct()
    {
        //print_r($_REQUEST);
        //set default page request when no parameters are in URL
        $pageRequest = 'uploadform';
        //check if there are parameters
        if(isset($_REQUEST['page'])) {
            //load the type of page the request wants into page request
            $pageRequest = $_REQUEST['page'];
        }
        //instantiate the class that is being requested
        $page = new $pageRequest;


        if($_SERVER['REQUEST_METHOD'] == 'GET') {
            $page->get();
        } else {
            $page->post();
        }

    }

}

abstract class page {
    protected $html;

    public function __construct()
    {
        $this->html .= '<html>';
        $this->html .= '<head><link rel="stylesheet" href="styles.css"></head>';
        $this->html .= '<body>';
    }
    public function __destruct()
    {
        $this->html .= '</body></html>';
        stringFunctions::printThis($this->html);
    }


}

class homepage extends page {

    //displays the homepage
    public function get() {

        $form = '<form action="index.php" method="post">';
        $form .= 'First name:<br>';
        $form .= '<input type="text" name="firstname" value="Mickey">';
        $form .= '<br>';
        $form .= 'Last name:<br>';
        $form .= '<input type="text" name="lastname" value="Mouse">';
        $form .= '<input type="submit" value="Submit">';
        $form .= '</form> ';
        $this->html .= 'homepage';
        $this->html .= $form;
    }

}

class uploadform extends page
{

    //displays the upload page
    public function get()
    {
        $form = '<form action="index.php?page=uploadform" method="post"
	enctype="multipart/form-data">';
        $form .= '<input type="file" name="fileToUpload" id="fileToUpload">';
        $form .= '<input type="submit" value="Upload File" name="submit">';
        $form .= '</form> ';
        $this->html .= '<h1>Upload Form</h1>';
        $this->html .= $form;

    }
    //uploads the file
    public function post() {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $fileType = pathinfo($target_file,PATHINFO_EXTENSION);

        if($fileType=='csv')
        {
            if(file_exists($target_file))
            {
                echo 'Sorry, file already exists';
            }
            else
            {
                move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
                header("Location:index.php?page=htmlTable&file=$target_file");
            }
        }
        else
        {
            echo 'Please upload a CSV file';

        }
    }
}

class htmlTable extends page {

    //displays the table
    function get()
    {

        $file = $_GET['file'];

        if (!file($file)) {
            echo 'The requested file does not exist';
        } else {


            $handle = fopen($file, "r");

            echo '<table>';
            //display header row if true
            if (true) {
                $csvcontents = fgetcsv($handle);
                echo '<tr>';
                foreach ($csvcontents as $headercolumn) {
                    echo "<th>$headercolumn</th>";
                }
                echo '</tr>';
            }
                // displaying contents
            while ($csvcontents = fgetcsv($handle)) {
                echo '<tr>';
                foreach ($csvcontents as $column) {
                    echo "<td>$column</td>";
                }
                echo '</tr>';
            }
            echo '</table>';
            fclose($handle);
        }
    }

}

class stringFunctions
{
    //prints out whatever string is passed through it
  static function printThis($string)
    {
        echo $string;
    }
}
?>