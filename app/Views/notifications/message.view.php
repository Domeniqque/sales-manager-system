<?php
if (!isset($message)) return null;

if (isset($message["success"])) {
    if (is_array($message["success"])) {
        foreach ($message["success"] as $msg) {
            _include("message._success", ["msg" => $msg]);
        }
    }

    if (is_string($message["success"])){
        _include("message._success", ["msg" => $message["success"]]);
    }
}

if (isset($message["error"])) {
    if (is_array($message["error"])) {
        foreach ($message["error"] as $msg) {
            _include("message._error", ["msg" => $msg]);
        }
    }

    if (is_string($message["error"])){
        _include("message._error", ["msg" => $message["error"]]);
    }
}
