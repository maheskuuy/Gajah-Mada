<?php
require_once "config.php";
   if(function_exists($_GET['function'])) {
         $_GET['function']();
      }   
   function get_film()
   {
      global $conn;      
      $query = $conn->query("SELECT * FROM film");            
      while($row=mysqli_fetch_object($query))
      {
         $data [] =$row;
      } if($data)
      {
      $response = array(                   
                     'message' =>'Success',
                     'data' => $data
                  );               
      }else {
         $response=array(
                     'message' =>'No Data Found'
                  );
      }

      header('Content-Type: application/json');
      echo json_encode($response);
   } 
   
   //data User
   function get_dataUser()
   {
      global $conn;      
      $query = $conn->query("SELECT * FROM data_user");            
      while($row=mysqli_fetch_object($query))
      {
         $data [] =$row;
      }

      header('Content-Type: application/json');
      echo json_encode($data);
   }
     function add_dataUser()
      {
         global $conn;   
         $check = array('Id_user' => '', 'Username' => '', 'Password' => '', 'Email' => '', 'Kontak' => '', 'Alamat' => '', 'level' => '');
         $check_match = count(array_intersect_key($_POST, $check));
         if($check_match == count($check)){
         
               $result = mysqli_query($conn, "INSERT INTO data_user SET
               Id_user = '$_POST[Id_user]',
               Username = '$_POST[Username]',
               Password = '$_POST[Password]',
               Email = '$_POST[Email]',
               Kontak = '$_POST[Kontak]',
               Alamat = '$_POST[Alamat]',
               level = '$_POST[level]'");

               
               if($result)
               {
                  $response=array(
                     'status' => 1,
                     'message' =>'Insert Success'
                  );
               }
               else
               {
                  $response=array(
                     'status' => 0,
                     'message' =>'Insert Failed.'
                  );
               }
         }else{
            $response=array(
                     'status' => 0,
                     'message' =>'Wrong Parameter'
                  );
         }
         header('Content-Type: application/json');
         echo json_encode($response);
      }    
   
   //function get_datauser (username)
   function get_dtUser_login()
   {
      global $conn;
      if (!empty($_GET["username"])&&!empty($_GET["password"])) {
         $username= $_GET["username"];
         $pass = $_GET["password"];      
      }            
      $query ="SELECT Username, Password FROM data_user WHERE Username= '$username' && Password ='$pass'";      
      $result = $conn->query($query);
      while($row = mysqli_fetch_object($result))
      {
         $data[] = $row;
      }            
      if($data)
      {
      $response = array(
                     'status' => 1,
                     'message' =>'Success',
                     'data' => $data
                  );               
      }else {
         $response=array(
                     'status' => 0,
                     'message' =>'No Data Found'
                  );
      }
      
      header('Content-Type: application/json');
      echo json_encode($response);
       
   }   
   // function get_user (id)
   function get_dtUser_id()
   {
      global $conn;
      if (!empty($_GET["id"])) {
         $id= $_GET["id"];      
      }            
      $query ="SELECT * FROM data_user WHERE Id_user = $id";      
      $result = $conn->query($query);
      while($row = mysqli_fetch_object($result))
      {
         $data[] = $row;
      }            
      if($data)
      {
      $response = array(
                     'status' => 1,
                     'message' =>'Success',
                     'data' => $data
                  );               
      }else {
         $response=array(
                     'status' => 0,
                     'message' =>'No Data Found'
                  );
      }
      
      header('Content-Type: application/json');
      echo json_encode($response);
       
   }
   //get film judul
   function get_film_jdl()
   {
      global $conn;
      if (!empty($_GET["jdl"])) {
         $judul = $_GET["jdl"];      
      }            
      $query ="SELECT * FROM film WHERE Judul= $judul";      
      $result = $conn->query($query);
      while($row = mysqli_fetch_object($result))
      {
         $data[] = $row;
      }            
      if($data)
      {
      $response = array(
                     'status' => 1,
                     'message' =>'Success',
                     'data' => $data
                  );               
      }else {
         $response=array(
                     'status' => 0,
                     'message' =>'No Data Found'
                  );
      }
      
      header('Content-Type: application/json');
      echo json_encode($response);
       
   }
   // function insert_karyawan()
   //    {
   //       global $connect;   
   //       $check = array('id' => '', 'nama' => '', 'jenis_kelamin' => '', 'alamat' => '');
   //       $check_match = count(array_intersect_key($_POST, $check));
   //       if($check_match == count($check)){
         
   //             $result = mysqli_query($connect, "INSERT INTO karyawan SET
   //             id = '$_POST[id]',
   //             nama = '$_POST[nama]',
   //             jenis_kelamin = '$_POST[jenis_kelamin]',
   //             alamat = '$_POST[alamat]'");
               
   //             if($result)
   //             {
   //                $response=array(
   //                   'status' => 1,
   //                   'message' =>'Insert Success'
   //                );
   //             }
   //             else
   //             {
   //                $response=array(
   //                   'status' => 0,
   //                   'message' =>'Insert Failed.'
   //                );
   //             }
   //       }else{
   //          $response=array(
   //                   'status' => 0,
   //                   'message' =>'Wrong Parameter'
   //                );
   //       }
   //       header('Content-Type: application/json');
   //       echo json_encode($response);
   //    }
   // function update_karyawan()
   //    {
   //       global $connect;
   //       if (!empty($_GET["id"])) {
   //       $id = $_GET["id"];      
   //    }   
   //       $check = array('nama' => '', 'jenis_kelamin' => '', 'alamat' => '');
   //       $check_match = count(array_intersect_key($_POST, $check));         
   //       if($check_match == count($check)){
         
   //            $result = mysqli_query($connect, "UPDATE karyawan SET               
   //             nama = '$_POST[nama]',
   //             jenis_kelamin = '$_POST[jenis_kelamin]',
   //             alamat = '$_POST[alamat]' WHERE id = $id");
         
   //          if($result)
   //          {
   //             $response=array(
   //                'status' => 1,
   //                'message' =>'Update Success'                  
   //             );
   //          }
   //          else
   //          {
   //             $response=array(
   //                'status' => 0,
   //                'message' =>'Update Failed'                  
   //             );
   //          }
   //       }else{
   //          $response=array(
   //                   'status' => 0,
   //                   'message' =>'Wrong Parameter',
   //                   'data'=> $id
   //                );
   //       }
   //       header('Content-Type: application/json');
   //       echo json_encode($response);
   //    }
   // function delete_karyawan()
   // {
   //    global $connect;
   //    $id = $_GET['id'];
   //    $query = "DELETE FROM karyawan WHERE id=".$id;
   //    if(mysqli_query($connect, $query))
   //    {
   //       $response=array(
   //          'status' => 1,
   //          'message' =>'Delete Success'
   //       );
   //    }
   //    else
   //    {
   //       $response=array(
   //          'status' => 0,
   //          'message' =>'Delete Fail.'
   //       );
   //    }
   //    header('Content-Type: application/json');
   //    echo json_encode($response);
   // }
 ?>

