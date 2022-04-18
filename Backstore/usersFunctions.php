<?php

function getUsers()
{
  return  json_decode(file_get_contents('users.json'), true);
}
function getUsers2()
{
  return  json_decode(file_get_contents('../Backstore/users.json'), true);
}
function getNewId()
{
  $users = getUsers();

  return  intval($users[count($users) - 1]["Id"] + 1);
}
function getUserById($Id)
{
  $users = getUsers();

  foreach ($users as $user) {
    if ($user['Id'] == $Id)
      return $user;
  }

  return null;
}

function getUserNameByEmail($Email)
{
  $users = getUsers();

  foreach ($users as $user) {
    if ($user['Email'] == $Email)
      return $user['Name'];
  }

  return null;
}

function createUser($data)
{
  $users = getUsers();

  $array = array(
    "Id" => getNewId(),
    "Name" => $data['Name'],
    "Email" => $data['Email'],
    "Password" => $data['Password'],
    "Adress" => $data['Adress'],
    "Age" => $data['Age'],
    "Admin_Status" => $data['Admin_Status']
  );

  array_push($users, $array);

  file_put_contents('users.json', json_encode($users));
}
function createUser2($data)
{
  $users = getUsers2();

  $array = array(
    "Id" => getNewId(),
    "Name" => $data['name'],
    "Email" => $data['email'],
    "Password" => $data['password'],
    "Adress" => $data['address'],
    "Age" => $data['Age'],
    "Admin_Status" => "User"
  );

  array_push($users, $array);

  file_put_contents('../Backstore/users.json', json_encode($users));
}

function editUser($data, $Id)
{
  $users = getUsers();



  foreach ($users as $i => $user) {
    if ($user['Id'] == $Id) {

      // $users[$i] = array_merge($user,$data);
      $users[$i]['Name'] = $data['Name'];
      $users[$i]['Email'] = $data['Email'];
      $users[$i]['Password'] = $data['Password'];
      $users[$i]['Adress'] = $data['Adress'];
      $users[$i]['Age'] = $data['Age'];
      $users[$i]['Admin_Status'] = $data['Admin_Status'];
    }
  }


  file_put_contents('users.json', json_encode($users));
}


function deleteUser($Id)
{
  $users = getUsers();

  foreach ($users as $i => $user) {
    if ($user['Id'] == $Id) {
      array_splice($users, $i, 1);
    }
  }

  file_put_contents('users.json', json_encode($users));
}

function Admin_Status($category)
{
  if ($category == "Admin")
    echo "checked";
}

function User_Status($category)
{
  if ($category ==  "User")
    echo "checked";
}


?>