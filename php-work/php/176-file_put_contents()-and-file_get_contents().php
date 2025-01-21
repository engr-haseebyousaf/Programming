<?php
file_put_contents("test.txt","This is a new text",FILE_APPEND | LOCK_EX);

echo file_get_contents("test.txt",false, null,3,35);