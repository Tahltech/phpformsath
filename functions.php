<?php

function validateInput(string $input) {
  $validatedInput =  htmlspecialchars(stripslashes(trim($input)));
  return $validatedInput;
}


function redirect(string $path) {
    header("Location: $path");
    exit;
}

function checkAuth($user) {
    if (!empty($user)) {
        return true;
    }

    return false;
}