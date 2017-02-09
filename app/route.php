<?php

$this->addRouteRule('/^\/(?<controller>[\w-]+)$/');
$this->addRouteRule('/^\/(?<controller>[\w-]+)\/(?<action>[\w-]+)$/');
$this->addRouteRule('/^\/(?<action>[\w-]+)$/');
