<?php

return array(
  // Don't require e-mail verification
  'auth.require-email-verification' => false,

  // SMTP outbound info
  'cluster.mailers' => [
    [
      "key" => "smtp-outbound",
      "type" => "smtp",
      "options" => [
        'host' => 'localhost',
        'port' => 587,
        'protocol' => 'tls',
        'user' => 'username',
        'password' => 'password',
        'message-id' => true,
      ]
    ],
  ],
  // Default From e-mail address
  'metamta.default-address' => 'outgoingemail@myhostname.localdomain',

  // Ignore some annoying things
  'config.ignore-issues' => [
    "cluster.mailers" => true,
    "security.security.alternate-file-domain" => true,
  ],

  // Populate SQL info via environment
  'mysql.host' => strval(getenv('PHABRICATOR_DATABASE_HOST')),
  'mysql.port' => strval(getenv('PHABRICATOR_DATABASE_PORT_NUMBER')),

  // Populate base URI via environment variable
  'phabricator.base-uri' => 'http://' . strval(getenv('PHABRICATOR_HOST')),

  // Show prototypes
  'phabricator.show-prototypes' => true,

  // Set a default timezone
  'phabricator.timezone' => 'America/Toronto',
);
