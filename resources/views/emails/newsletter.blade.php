@component('mail::message')
# Welcome to Our Newsletter!

Thank you for subscribing to our newsletter. You'll now receive the latest updates, articles, and exclusive content directly in your inbox.

@component('mail::button', ['url' => url('/blog')])
Browse Our Blog
@endcomponent

Thanks,<br>
The Daily Wager
@endcomponent