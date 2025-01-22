<?php
use App\Models\User;
User::updateOrCreate(["name" => "Leo one", "age" => 19],
    ["email" => "four@gmail.com",
        "city" => "Goa",
        "age" => 67
    ]
);

return User::get();
?>