<?php

use App\Models\Contact;
use App\Repositories\BaseRepository;

if (!function_exists('user')) {
    function user()
    {
        return auth()->user();
    }
}

if (!function_exists('phoneNumber')) {
    function phoneNumber()
    {
        $repo = app(BaseRepository::class);
        $contact = $repo->first(Contact::class);

        $phones = explode(';', $contact->phone);

        // $phones = ($contact->phone != null) ? explode(';', $contact->phone) : "";

        return $phones;
    }
}

if (!function_exists('emailAddress')) {
    function emailAddress()
    {
        $repo = app(BaseRepository::class);
        $contact = $repo->first(Contact::class);

        $emails = explode(';', $contact->email);

        return $emails;
    }
}

if (!function_exists('showPhone')) {
    function showPhone($section)
    {
        $repo = app(BaseRepository::class);
        $contact = $repo->first(Contact::class);

        $phoneNumber = '<p>Aucun N° de téléphone configuré</p> <br>';

        if (isset($contact) && $section == 'contact') {
            if ($contact->phone != null) {
                $phones = explode(';', $contact->phone);
                if (sizeof($phones) == 0) {
                    $phoneNumber = '<p>Aucun N° de téléphone configuré</p> <br>';
                } elseif (sizeof($phones) == 1) {
                    $phoneNumber = '<p>' . $phones[0] . '</p> <br>';
                } elseif (sizeof($phones) == 2) {
                    $phoneNumber = '<p>' . $phones[0] . ' / ' . $phones[1] . '</p> <br>';
                } else {
                }
            }
        }

        if ($section == 'footer') {
            dd('footer');
            if (isset($contact) && $contact->phone != null) {
                $phoneNumber = 'Aucun N° de téléphone configuré <br>';
            } else {
                $phones = explode(';', $contact->phone);
                if (sizeof($phones) == 0) {
                    $phoneNumber = 'Aucun N° de téléphone configuré <br>';
                } elseif (sizeof($phones) == 1) {
                    $phoneNumber = $phones[0] . '<br>';
                } elseif (sizeof($phones) == 2) {
                    $phoneNumber = $phones[0] . ' / ' . $phones[1] . '<br>';
                } else {
                }
            }
        }

        return $phoneNumber;
    }
}

if (!function_exists('showFooterPhone')) {
    function showFooterPhone()
    {
        $repo = app(BaseRepository::class);
        $contact = $repo->first(Contact::class);

        $phoneNumber = '<p>Aucun N° de téléphone configuré</p> <br>';

        // dd('footer');
        if (isset($contact) && $contact->phone != null) {
            $phoneNumber = 'Aucun N° de téléphone configuré <br>';
        } else {
            $phones = explode(';', $contact->phone);
            if (sizeof($phones) == 0) {
                $phoneNumber = 'Aucun N° de téléphone configuré <br>';
            } elseif (sizeof($phones) == 1) {
                $phoneNumber = $phones[0] . '<br>';
            } elseif (sizeof($phones) == 2) {
                $phoneNumber = $phones[0] . ' / ' . $phones[1] . '<br>';
            } else {
            }
        }

        return $phoneNumber;
    }
}

if (!function_exists('showEmail')) {
    function showEmail($section)
    {
        $repo = app(BaseRepository::class);
        $contact = $repo->first(Contact::class);

        $email = '<p> Aucune adresse email configurée </p> <br>';

        if ($section == 'contact') {
            if (isset($contact)) {
                if ($contact->email != null) {
                    $emails = explode(';', $contact->email);
                    if (sizeof($emails) == 1) {
                        $email = '<p>' . $emails[0] . '</p> <br>';
                    }
                    if (sizeof($emails) == 2) {
                        $email = '<p>' . $emails[0] . ' / ' . $emails[1] . '</p> <br>';
                    }
                }
            }
        }

        if ($section == 'footer') {
            if (isset($contact)) {
                if ($contact->email != null) {
                    $emails = explode(';', $contact->email);
                    if (sizeof($emails) == 1) {
                        dd('1');
                        $email = $emails[0] . '<br>';
                    }
                    if (sizeof($emails) == 2) {
                        dd('2');
                        $email = $emails[0] . ' / ' . $emails[1] . '<br>';
                    }
                }
            }
        }

        return $email;
    }
}

if (!function_exists('showSocialNetworks')) {
    function showSocialNetworks()
    {
        $repo = app(BaseRepository::class);
        $contact = $repo->first(Contact::class);
    }
}
