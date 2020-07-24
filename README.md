# Laravel contact-mail
Save and send "contact us" email using AJAX and laravel

## Installation
You can install this package via composer using this command:
```
require avayabaniya/contact-mail
```
The package will automatically register itself.

You will have to publish the contact-message.js into your project to use this package. You can publish the file with:
```
php artisan vendor:publish --provider="avayabaniya\ContactMailer\Providers\ContactMailerServiceProvider"
```

This will create ths packages' config file called `contact-mailer.php` in the `config` directory along with `contact-message.js` file in the `public/contact_mail/js` directory.
 `contact_form_example.blade.php` is also published in the `views` directory which can be used for testing.
 
 ## How to use
 After publish the files you will have to run the migration using the following command:
```
php artisan migrate
```
This will create `contact_messages` table in your database where contact message are saved using `ContactMessage` eloquent model.
This behaviour can be modified by specifying your custom model in the packages' config file.

Next step will be to configure your mail driver in the `.env` file
```
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=null
MAIL_FROM_NAME="${APP_NAME}"
```

Now you can include the js file in you blade template file by adding the following line
```
<script src="{{ asset('contact_mail/js/contact-message.js') }}"></script>
```
You will also have to set id of the `contact form` as `contact-form` and the id of `submit button` as `contact-submit`.

The contact form's input fields should have name as
- name
- email
- number
- subject
- message

## Testing
You can test by using the contact form at `contact_form_example.blade.php` having url `{{base_url}}/contact-form-example`

or

run the tests with
```
vendor/bin/phpunit
```

## Improvement
Contributions are welcome through pull requests. Also feel free to create any new issues.
