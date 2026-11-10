<?php

return [
    'domenTitle' => 'What is a domain? A simple explanation, examples and how to choose the right one',

    'x_short' => '<strong>Short answer:</strong> a domain is a website\'s address on the internet — for example, <strong>rs-code.az</strong>. Computers identify each other by numbers (IP addresses), and a domain turns those numbers into a memorable name. A domain is registered for an annual fee, and to launch a website you also need <strong>hosting</strong>.',

    'domen1' => 'What is a domain?',
    'domen2' => 'A domain (domain name) is a website\'s name and address on the internet. A user types the domain into the browser and the website opens. Without a domain, a site could only be reached by an IP address made up of numbers, and nobody remembers those.',
    'domen3' => 'A domain is a company\'s business card on the internet: the same name is used in the website address, corporate email (info@yourcompany.az), advertising and social media profiles. That is why choosing a domain is a branding decision, not just a technical step.',
    'domen4' => 'Buying a domain does not mean owning it for ever — a domain is registered for a period of 1 to 10 years and must be renewed on time. A domain that is not renewed becomes available again after a while, and someone else can register it.',
    'domen5' => 'A domain name can contain letters, numbers and hyphens (-). Each part can be up to 63 characters long, but in practice a short name is always better.',

    'how_title' => 'How does a domain work?',
    'how_steps' => [
        'The user types <strong>yourcompany.az</strong> into the browser.',
        'The browser queries the DNS system: "which IP address is this domain on?"',
        'DNS returns the IP address of the server (hosting) the domain points to.',
        'The browser connects to that server and the website opens.',
    ],
    'how_note' => 'This process takes a fraction of a second. When you move a domain from one hosting provider to another, you change its DNS records — the domain name itself stays the same.',

    'parts_title' => 'Parts of a domain',
    'parts' => [
        ['<strong>www</strong>', 'A subdomain. It is optional: rs-code.az and www.rs-code.az can point to the same website. Subdomains can also be created for other purposes, for example blog.yourcompany.az.'],
        ['<strong>rs-code</strong>', 'The main name — the part you choose and register.'],
        ['<strong>.az</strong>', 'The extension (zone, TLD). It indicates the type or country of the domain.'],
    ],

    'domen6' => 'Domain, hosting and website: what is the difference?',
    'domen7' => 'Buying a domain is not enough to launch a website. A simple comparison: the domain is the address, hosting is the "plot of land" where the website\'s files are stored, and the website is the "house" built on that plot. You need all three: the domain directs users to the hosting, and the hosting serves the website. You can also buy the domain and hosting from different companies.',

    'domen8' => 'What do domain extensions mean?',
    'domen9' => '.az — the country-code domain of Azerbaijan.',
    'domen10' => '.com.az, .org.az, .net.az, .edu.az — second-level domains within the .az zone.',
    'domen11' => '.com — originally for commercial organisations, today the most widely used international extension.',
    'domen12' => '.org — originally for non-profit organisations.',
    'domen13' => '.net — originally for internet and network projects.',
    'domen14' => '.edu, .gov — restricted zones for educational and government institutions.',
    'domen15' => '.info, .biz — general extensions for information websites and businesses.',
    'domen16' => '.shop, .online, .store, etc. — new generic extensions.',

    'domen17' => '.az or .com?',
    'domen18' => 'If you mainly serve customers in Azerbaijan, a .az domain shows that you are a local company and is familiar to customers. If you work in international markets, .com is a better fit. Many companies buy both: the main website runs on one, and the other redirects to it. This also stops someone else from launching a website under a similar name.',

    'choose_title' => 'How to choose the right domain for a business',
    'choose' => [
        ['Keep it short and memorable', 'You shouldn\'t have to spell it out letter by letter over the phone.'],
        ['Match it to your brand', 'When your company name, Instagram profile and domain are the same, customers find you easily.'],
        ['Avoid special characters', 'Use plain Latin letters instead of Azerbaijani letters such as ə, ş, ç: for example, write "cicek", not "çiçək". A name like that is typed the same way on any keyboard.'],
        ['Use hyphens and numbers sparingly', 'One hyphen is fine if needed, but names like "company-2024-baku" are hard to remember.'],
        ['Check for legal risks', 'Do not use another company\'s well-known brand or trademark in your domain name.'],
        ['Renew on time', 'Turn on auto-renewal and keep the email address that receives renewal reminders up to date.'],
    ],

    'buy_title' => 'How to buy a domain',
    'buy_steps' => [
        'Check on the registrar\'s website whether the name you want is available.',
        'Choose the extension (.az, .com, etc.) and set the registration period (usually 1 year).',
        'Enter the owner\'s details correctly — whoever the domain is registered to is its owner.',
        'Make the payment and connect the domain to your hosting (DNS records).',
        'Set up corporate email and an SSL certificate.',
    ],
    'buy_note' => '.az domains are registered through accredited registrars, while .com and other international extensions are registered through international registrars. Prices vary by extension and registrar. Important advice: register the domain in the company\'s own name and under its own account — not in the name of the person who builds the website.',

    'x_faq_title' => 'Frequently asked questions',
    'x_faq' => [
        ['What is a domain?', 'A domain is a website\'s address on the internet, for example rs-code.az. It turns the server\'s numeric IP address into a memorable name, and users reach the website by typing that name into the browser.'],
        ['What is the difference between a domain and hosting?', 'A domain is the address, while hosting is the server where the website\'s files are stored. You need both to launch a website: the domain directs users to the hosting.'],
        ['Is a domain a one-off purchase?', 'No. A domain is registered for a period of 1 to 10 years and must be renewed on time. A domain that is not renewed becomes available and can be registered by someone else.'],
        ['Where can I buy a .az domain?', '.az domains are registered through accredited registrars. It is recommended to register the domain in the company\'s own name and under its own account.'],
        ['Should I choose .az or .com?', '.az is better suited to the Azerbaijani market, and .com to international markets. Often the most reliable option is to buy both and redirect one to the other.'],
        ['Can I set up corporate email with a domain?', 'Yes. If you have a domain, you can create corporate email addresses such as info@yourcompany.az. See: <a href="/corporate-email" class="text-violet-300 underline">setting up corporate email</a>.'],
    ],
];
