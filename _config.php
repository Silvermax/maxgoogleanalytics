<?php

if (!class_exists("GoogleConfig")) {user_error("Install GoogleAnalytics module first!");}

Object::add_extension("Page", "MaxGoogleAnalytics");
