<?php

function verifyLoginPassword (PDO $pdo, string $email, string $password) {
  $sql = 'SELECT * FROM users WHERE email = :email'; 
  $query = $pdo->prepare($sql);
  $query->bindParam(':email', $email, PDO::PARAM_STR);
  $query->execute();
  $user = $query->fetch();

  if ($user && password_verify($password, $user['password']) ) {
    return $user;
  } else {
    return false;
  }
}


function  addUser (PDO $pdo, string $first_name, string $last_name, string $email, string $password) {
  $password = password_hash($password, PASSWORD_DEFAULT);
  $sql = "INSERT INTO `users` (`id`, `email`, `first_name`, `last_name`, `password`, `role`) VALUES (NULL, :email, :first_name, :last_name, :password, 'user');"; 
  $query = $pdo->prepare($sql);
  $query->bindParam(':email', $email, PDO::PARAM_STR);
  $query->bindParam(':first_name', $first_name, PDO::PARAM_STR);
  $query->bindParam(':last_name', $last_name, PDO::PARAM_STR);
  $query->bindParam(':password', $password, PDO::PARAM_STR);
  /*$query->bindParam(':role', 'user', PDO::PARAM_STR);*/
  return $query->execute();
}
