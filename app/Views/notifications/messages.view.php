<?php
if (! message()->has()) return null;
if (message()->has("success")) {
    $message = message("success");

    if (is_array($message)) {
        foreach ($message as $msg) {
            _include("notifications._success", ["msg" => $msg]);
        }
    }

    if (is_string($message)){
        _include("notifications._success", ["msg" => $message]);
    }
}

if (message()->has("error")) {
    $message = message("error");
    if (is_array($message)) {
        foreach ($message as $msg) {
            _include("notifications._error", ["msg" => $msg]);
        }
    }

    if (is_string($message)){
        _include("notifications._error", ["msg" => $message]);
    }
}

