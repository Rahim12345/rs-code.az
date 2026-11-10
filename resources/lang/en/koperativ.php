<?php

return [
    'title' => 'Corporate email setup: info@yourcompany.az',
    'kop1' => 'One of the most important factors of your corporate identity in the Internet space is your e-mail address established in the company domain.',
    'kop2' => 'Especially if you are a new company, you need to show your company image at a high level in order to gain a competitive advantage. Using a company email is also an indication of your respect for your work and how serious you are about your business.',
    'kop3' => 'The most commonly used forms of corporate mail:',
    'kop4' => 'office@yourcompany.az',
    'kop5' => 'info@yourcompany.az',
    'kop6' => 'hr@yourcompany.az',
    'kop7' => 'director@yourcompany.az',
    'kop8' => 'name.surname@yourcompany.az',
    'kop9' => 'If corporate identity and company seriousness are important factors for you, mail.ru, gmail.com, hotmail.com, yahoo.com, etc. instead, you must select the email accounts that belong to your company.',
    'kop10' => 'This is especially important for start-up companies. Remember that sending your suggestions and correspondence by corporate mail adds value to your company.',
    'kop11' => '6 unknown advantages of company mail:',
    'kop12' => 'Increases the seriousness and professionalism of your business',
    'kop13' => 'You control the letters sent to all departments of the company',
    'kop14' => 'If an employee resigns, it is possible to delete, redirect and fully control his corporate email',
    'kop15' => 'An automatic backup system keeps a backup of your emails',
    'kop16' => 'If the mail is deleted by mistake or during a cyber attack, it is possible to return it',
    'kop17' => 'It costs very little',
    'x_short' => '<strong>Short answer:</strong> a corporate email is a mailbox on your company\'s own domain — for example, <strong>info@yourcompany.az</strong>. You need a domain and a mail service (hosting mail, Google Workspace or Microsoft 365). Setting it up means configuring the domain\'s DNS records (MX, SPF, DKIM, DMARC) correctly. When you order a website from RS Code, setting up corporate email on your domain is included in the service.',

    'opt_title' => '3 main options for corporate email',
    'opt_head' => ['Option', 'Best for', 'Advantage', 'Bear in mind'],
    'opt_rows' => [
        ['Hosting mail', 'Small companies, a few addresses', 'Often included in the hosting plan, no extra subscription needed', 'Mailbox size and spam filtering depend on the hosting'],
        ['Google Workspace', 'Teams used to the Gmail interface', 'Familiar Gmail, Drive, Meet and strong spam protection', 'Monthly subscription fee per user'],
        ['Microsoft 365', 'Companies working with Outlook, Word and Excel', 'Full integration with Outlook, Teams and Office apps', 'Monthly subscription fee per user'],
    ],
    'opt_note' => 'Third-party plans and prices (Google, Microsoft) may change — check the current terms on their official websites.',

    'dns_title' => 'Keep your emails out of spam: DNS records',
    'dns_intro' => 'The most common corporate email problem is outgoing messages landing in the recipient\'s spam folder. The cause is usually incomplete DNS records on the domain:',
    'dns_rows' => [
        ['MX', 'Specifies which mail server receives messages sent to the domain. If MX is wrong, emails do not arrive at all.'],
        ['SPF', 'States which servers are allowed to send email on behalf of your domain.'],
        ['DKIM', 'Adds a digital signature to each message, so the recipient can verify it was not altered in transit.'],
        ['DMARC', 'Defines what to do with messages that fail SPF and DKIM checks (accept, spam, reject) and sends you reports.'],
    ],
    'dns_note' => 'Large mail providers such as Gmail and Yahoo require SPF, DKIM and DMARC from bulk senders. Even for a small company, these records significantly improve email deliverability.',

    'steps_title' => 'How is corporate email set up?',
    'steps' => [
        'A domain is chosen and registered (if you already have a domain, it is used).',
        'A mail service is chosen: hosting mail, Google Workspace or Microsoft 365.',
        'MX, SPF, DKIM and DMARC records are configured in the domain\'s DNS.',
        'The required addresses are created: info@, sales@, personal staff addresses, forwarding.',
        'Mail is connected on phones and computers (Gmail, Outlook, Apple Mail).',
        'Test emails are sent and a spam check is carried out.',
    ],
    'steps_note' => 'When moving from an old mailbox (e.g. Gmail or mail.ru) to a corporate address, previous emails can be migrated and forwarding can be set up from the old address.',

    'x_faq_title' => 'Frequently asked questions',
    'x_faq' => [
        ['What is corporate email?', 'It is a mailbox on your company\'s own domain, e.g. info@yourcompany.az. Unlike gmail.com or mail.ru addresses, it belongs to the company and builds more trust with customers.'],
        ['What do I need for corporate email?', 'A company domain and a mail service: hosting mail, Google Workspace or Microsoft 365. Then MX, SPF, DKIM and DMARC records are configured in the domain\'s DNS.'],
        ['Can I use corporate email in the Gmail app?', 'Yes. If you choose Google Workspace, the address works directly in Gmail. Hosting mail can also be connected to Gmail, Outlook or your phone\'s mail app.'],
        ['Why do my emails go to spam?', 'The most common reason is missing or misconfigured SPF, DKIM and DMARC records. Once these records are set up correctly, deliverability improves considerably.'],
        ['What happens to an employee\'s mailbox when they leave?', 'Corporate mail belongs to the company: you can close the employee\'s account, change the password or forward incoming emails to another employee. The correspondence stays with the company.'],
        ['Is corporate email included when I order a website?', 'Yes. At RS Code, our <a href="/website-development" class="text-violet-300 underline">website development</a> service includes setting up corporate email on your domain. About domains: <a href="/what-is-domain" class="text-violet-300 underline">what is a domain</a>.'],
    ],
];
