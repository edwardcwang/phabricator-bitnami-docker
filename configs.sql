# Example
# Enforce that registrations are disabled

USE bitnami_phabricator_auth;
UPDATE auth_providerconfig SET shouldAllowRegistration=0, shouldAllowUnlink=1 WHERE providerClass = 'PhabricatorPasswordAuthProvider';
