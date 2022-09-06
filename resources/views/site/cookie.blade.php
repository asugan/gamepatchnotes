@extends('layouts.main')

@section('content')
    <div class="container text-white py-8">
        <div class="breadcrumb flex justify-start items-center pb-8">
            <nav class="bctext font-bold" aria-label="Breadcrumb">
                <ol class="list-none p-0 inline-flex" itemscope itemtype="https://schema.org/BreadcrumbList">
                    <li class="flex items-center" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                        <a itemprop="item" class="hover:underline" href="{{ route('welcome') }}"><span
                                itemprop="name">Home</span></a>
                        <svg class="fill-current w-3 h-3 mx-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                            <path
                                d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z" />
                        </svg>
                        <meta itemprop="position" content="1" />
                    </li>
                    <li class="flex items-center" itemprop="itemListElement" itemscope
                        itemtype="https://schema.org/ListItem">
                        <a class="hover:underline" itemprop="item" href="{{ route('cookie') }}"> <span
                                itemprop="name">Cookie Policy</span></a>
                        <meta itemprop="position" content="2" />
                    </li>
                </ol>
            </nav>
        </div>
        <h1 class="text-4xl">Cookie Policy</h1>
        <h2 class="text-2xl py-4">Cookie Policy for Latest Patch Notes</h2>
        <p>This is the Cookie Policy for Latest Patch Notes, accessible from https://latestpatchnotes.com/</p>
        <h2 class="text-2xl py-4">Personal data storage and processing</h2>
        <p>We collect and process your personal data only with your willing consent. With your permission, we can collect
            and process the following data: name and surname, e-mail address, . Collection and processing of your personal
            information is carried out in accordance with the laws of the European Union and the Turkey.</p>
        <h2 class="text-2xl py-4">What Are Cookies</h2>

        <p>As is common practice with almost all professional websites this site uses cookies, which are tiny files that are
            downloaded to your computer, to improve your experience. This page describes what information they gather, how
            we use it and why we sometimes need to store these cookies. We will also share how you can prevent these cookies
            from being stored however this may downgrade or 'break' certain elements of the sites functionality.</p>

        <h2 class="text-2xl py-4">How We Use Cookies</h2>

        <p>We use cookies for a variety of reasons detailed below. Unfortunately in most cases there are no industry
            standard options for disabling cookies without completely disabling the functionality and features they add to
            this site. It is recommended that you leave on all cookies if you are not sure whether you need them or not in
            case they are used to provide a service that you use.</p>

        <h2 class="text-2xl py-4">Disabling Cookies</h2>

        <p>You can prevent the setting of cookies by adjusting the settings on your browser (see your browser Help for how
            to do this). Be aware that disabling cookies will affect the functionality of this and many other websites that
            you visit. Disabling cookies will usually result in also disabling certain functionality and features of the
            this site. Therefore it is recommended that you do not disable cookies. This </p>

        <h2 class="text-2xl py-4">The Cookies We Set</h2>

        <p>Account related cookies

            If you create an account with us then we will use cookies for the management of the signup process and general
            administration. These cookies will usually be deleted when you log out however in some cases they may remain
            afterwards to remember your site preferences when logged out.

            Site preferences cookies

            In order to provide you with a great experience on this site we provide the functionality to set your
            preferences for how this site runs when you use it. In order to remember your preferences we need to set cookies
            so that this information can be called whenever you interact with a page is affected by your preferences.</p>

        <h2 class="text-2xl py-4">Third Party Cookies</h2>

        <p>In some special cases we also use cookies provided by trusted third parties. The following section details which
            third party cookies you might encounter through this site.

            This site uses Google Analytics which is one of the most widespread and trusted analytics solution on the web
            for helping us to understand how you use the site and ways that we can improve your experience. These cookies
            may track things such as how long you spend on the site and the pages that you visit so we can continue to
            produce engaging content.

            For more information on Google Analytics cookies, see the official Google Analytics page.

            From time to time we test new features and make subtle changes to the way that the site is delivered. When we
            are still testing new features these cookies may be used to ensure that you receive a consistent experience
            whilst on the site whilst ensuring we understand which optimisations our users appreciate the most.

            The Google AdSense service we use to serve advertising uses a DoubleClick cookie to serve more relevant ads
            across the web and limit the number of times that a given ad is shown to you.

            For more information on Google AdSense see the official Google AdSense privacy FAQ.

            Several partners advertise on our behalf and affiliate tracking cookies simply allow us to see if our customers
            have come to the site through one of our partner sites so that we can credit them appropriately and where
            applicable allow our affiliate partners to provide any bonus that they may provide you for making a purchase.
        </p>

        <h2 class="text-2xl py-4">More Information</h2>

        <p>Hopefully that has clarified things for you and as was previously mentioned if there is something that you aren't
            sure whether you need or not it's usually safer to leave cookies enabled in case it does interact with one of
            the features you use on our site.

            However if you are still looking for more information then you can contact us through one of our preferred
            contact methods:

            Email: cagatayeren18@hotmail.com</p>

        <h2 class="text-2xl py-4">Patch notes database of every games.</h2>

        <p>This third-party website gives you better insight into the latest patch notes of games in every platforms.

            Look through our FAQ if you have any questions, join our Discord. Follow @latestpnotes on Twitter.</p>
    </div>
@endsection
