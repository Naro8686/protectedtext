<x-app-layout>
    <x-slot name="seo_title">
        {{$page->seo_title}}
    </x-slot>
    <x-slot name="seo_description">
        {{$page->seo_description}}
    </x-slot>
    <x-slot name="seo_keywords">
        {{$page->seo_keywords}}
    </x-slot>
    <div class="container" id="loadingdiv">
        <p id="loadingtext">Loading...</p>
    </div>
    <div class="displaynone" id="wholesite">
        <div id="homepage-first-div">
            <div class="container">
                <div class="sixteen columns">
                    <div class="eight columns alpha">
                        <div class="eight columns alpha omega">
                            <a href="{{pageUrlWhereName('home')}}"><img
                                        alt="Protected Text"
                                        src="{{asset('assets/images/logo-big.png')}}"
                                        id="logo-big-img"></a>
                        </div>
                        <div class="eight columns alpha omega">
                            <!--h1 id="slogan">Your text. Protected.</h1-->
                        </div>
                    </div>
                    <div class="seven columns omega offset-by-one">
                        <ul id="homepage-first-list">
                            <li> The <span>safest</span> site on the web for <span>storing your text!</span></li>
                            <li> Enter any URL, e.g. {{config('app.domain')}}<span class="monospace-text">/</span><span
                                        class="italic-span">anything</span><br/> You find it - it's yours!
                            </li>
                            <li><span>Encrypt</span> all your notes, access anywhere.</li>
                            <li> Simple. Fast. Free. No ads. Secure - don't trust us, <span>check the code</span>
                                yourself.
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="sixteen columns" id="homepage-button-div">
                    <form onsubmit="return false">
                        <p class="remove-bottom"><span class="softColor">Go to</span> {{config('app.domain')}}<span
                                    class="monospace-text">/</span>
                            <input type="text" id="siteToVisit" value=""
                                   class="remove-bottom text ui-widget-content ui-corner-all"/>
                            <button class="remove-bottom" id="button-go">Go</button>
                            <span class="softColor">(or write directly in the address bar)</span>
                        </p>
                    </form>

                </div>
                <div class="sixteen columns">
                    <div class="seven columns alpha omega offset-by-one">
                        <a href="{{pageUrlWhereName('helpusfight')}}">
                            <img class="six columns android-app-promo" alt="help us fight link"
                                 src="{{asset('assets/images/help-img-emph.jpg')}}"/>
                        </a>
                    </div>
                    <div class="seven columns alpha omega offset-by-one">
                        <a href="https://play.google.com/store/apps/details?id=com.protectedtext.android">
                            <img class="six columns android-app-promo" alt="app link"
                                 src="{{asset('assets/images/pt-app-link-img.jpg')}}"/>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="homepage-hline-darker"></div>
        <div class="homepage-hline-lighter"></div>
        <div id="homepage-second-div">
            <div class="container">
                <div class="sixteen columns">
                    <div class="offset-by-one fourteen columns alpha">
                        <ul id="homepage-seo-text">
                            <li><span>{{$settings->get('app_name',config('app.name'))}}</span> is an free online notepad
                                with password, where you can
                                securely
                                save your notes on the web. <br>
                                It's a secure notepad with password, for all your notes, ideas, to-do lists, scripts,
                                etc.
                                You can store notes online at {{config('app.domain')}}/ANY_SITE_YOU_TYPE and access from
                                any
                                web
                                browser.
                                It's free and also <span>without ads</span> and tracking, and you don't even have to
                                register or have any kind of account.
                                Store your notes <span>anonymously and encrypted</span> in this simple and secure free
                                online notepad.
                                You can also use our <span>Android app</span> to access your notes conveniently from
                                your
                                Android device.
                            </li>
                            <li>The most popular online notepad that utilizes <span>Trustless Security</span>.<br>
                                <span class="comment">"Trustless Security is an ultimate security approach, where users don't have to trust those who are providing the service."</span>
                            </li>
                        </ul>

                    </div>
                    <div class="eight columns omega">

                    </div>
                </div>
                <div class="sixteen columns">
                    <div class="eight columns alpha">
                        <h3>Why is it safe?</h3>
                        <ul>
                            <li>Your password isn't sent to our server - <span>we can't decrypt your text</span> even if
                                we
                                wanted to. Only encrypted text is sent over the Internet.
                            </li>
                            <li><span>No cookies</span>, no sessions, <span>no registration, no users tracking.</span>
                                We
                                can't identify you at all. We can't know when the same user visits two different sites.
                            </li>
                            <li>No logging in or out, just close the browser tab and you're safe.
                            </li>
                            <li><span>No ads</span> - we hate ads because they can track you, and they're distracting.
                            </li>
                            <li>You don't have to trust anyone or agree on anything -
                                <span>check the code yourself</span>.
                                All our code is well written and full of comments so that you can understand it in
                                details -
                                start by looking at <a href="{{asset('assets/js/main.js')}}">main.js</a>, and check
                                communication with our
                                servers.
                            </li>
                            <li>If someone wants your text, he'll need your password, but he'll have to find your site
                                first.
                            </li>
                        </ul>
                        <h3>Overwrite protection</h3>
                        <ul>
                            <li>You can use the same sub-site from multiple browsers/devices at the same time, without
                                having to worry about ever losing any changes.
                            </li>
                        </ul>
                    </div>
                    <div class="eight columns omega">
                        <img src="{{asset('assets/images/image.png')}}" alt="explanation image" id="img-explanation">
                    </div>
                </div>
                <div class="sixteen columns">
                    <h2>FAQ:</h2>
                    <ol>
                        <li>
                            <p class="remove-bottom faq-question"><span class="bold-span">Q:</span> I've forgotten my
                                password, what can I do? </p>
                            <p class="faq-answer"><span class="bold-span">A:</span>
                                Passwords are never sent to our servers. We only store encrypted text - which is useless
                                data once a password is lost. Also, we don't know who this text belongs to.
                            </p>
                        </li>
                        <li>
                            <p class="remove-bottom faq-question"><span class="bold-span">Q:</span> Please explain
                                'Trustless Security'. </p>
                            <p class="faq-answer"><span class="bold-span">A:</span>
                                Your password never leaves your device. We only store encrypted content. You don't have
                                to
                                trust us, or anyone else with your password, since only you know it and only you can
                                decrypt
                                your notes.
                                It's like if you're writing a diary with special characters that only you understand. It
                                doesn't matter where you keep this diary, since only you can understand the text that's
                                inside.
                            </p>
                        </li>
                        <li>
                            <p class="remove-bottom faq-question"><span class="bold-span">Q:</span> How can I make
                                encrypted
                                backup of my notes? </p>
                            <p class="faq-answer"><span class="bold-span">A:</span>
                                It's simple: Open your site with Google Chrome or Mozilla Firefox and save the site
                                before
                                decrypting it (Ctrl + S should work). Make sure to save the site while 'Password
                                required'
                                dialog is still visible. To open your encrypted backup, open saved .html file and type
                                in
                                your password.
                            </p>
                        </li>
                        <li>
                            <p class="remove-bottom faq-question"><span class="bold-span">Q:</span> Why is my URL
                                changed
                                from &quot;Mark's notes&quot; to &quot;mark-s-notes&quot;? </p>
                            <p class="faq-answer"><span class="bold-span">A:</span>
                                Some characters aren't allowed in URL addresses, that's why your URL is redirected to a
                                URL
                                that has some characters replaced with dashes. You can always type in <span
                                        class="italic-span">&quot;Mark's notes&quot;</span> and you'll be redirected to
                                the
                                same
                                URL.
                            </p>
                        </li>
                        <li>
                            <p class="remove-bottom faq-question"><span class="bold-span">Q:</span> Can I make a site
                                public? </p>
                            <p class="faq-answer"><span class="bold-span">A:</span>
                                You can add the password after the URL of your site, like this: <span
                                        class="italic-span">{{config('app.domain')}}/yourSite<span
                                            class="bold-italic-span">?yourPassword</span></span> which will
                                automatically
                                decrypt yourSite with yourPassword.
                            </p>
                        </li>
                        <div id="faq-more">
                            <li>
                                <p class="remove-bottom faq-question"><span class="bold-span">Q:</span> What are your
                                    long-term plans? How will you react to legal pressure? </p>
                                <p class="faq-answer"><span class="bold-span">A:</span>
                                    We'd like to create a file storage and sharing service with a similar security
                                    approach.
                                    <br/>
                                    In case of legal prosecutions, we can't hurt users because we don't know anything
                                    about
                                    them, and we can't decrypt their notes.
                                </p>
                            </li>
                            <li>
                                <p class="remove-bottom faq-question"><span class="bold-span">Q:</span> Why is this
                                    better
                                    then Evernote? </p>
                                <p class="faq-answer"><span class="bold-span">A:</span>
                                    Evernote is far from secure, and their <a
                                            href="https://evernote.com/legal/privacy.php">Privacy
                                        Policy</a> says
                                    that your notes may be viewed where necessary <span class="italic-span">&#39;to comply with our legal obligations, such as responding to warrants, court orders or other legal process.&#39;</span>
                                </p>
                            </li>
                            <li>
                                <p class="remove-bottom faq-question"><span class="bold-span">Q:</span> Do I have to use
                                    a
                                    long password? </p>
                                <p class="faq-answer"><span class="bold-span">A:</span>
                                    You don't have to, but it's recommended. The longer the password, the harder it is
                                    to
                                    guess it. Note that your text is protected by both the URL and your password.
                                </p>
                            </li>
                            <li>
                                <p class="remove-bottom faq-question"><span class="bold-span">Q:</span> Can I use a
                                    suspicious internet connection (e.g. Starbucks)? </p>
                                <p class="faq-answer"><span class="bold-span">A:</span>
                                    Yes. Your password (or password hashes) are never sent over the network, and all
                                    data
                                    that's sent or received is always encrypted. Your data is decrypted only on your
                                    device,
                                    and encrypted before it's returned to us.
                                </p>
                            </li>
                            <li>
                                <p class="remove-bottom faq-question"><span class="bold-span">Q:</span> How can you
                                    verify
                                    that a password is correct if you don't store it anywhere and don't send it to
                                    server?
                                    How do you authenticate the user? </p>
                                <p class="faq-answer"><span class="bold-span">A:</span>
                                    The server doesn't know anything about authentication; that's all handled in your
                                    browser. There are no users on {{config('app.domain')}}, just sites. Passwords are
                                    never
                                    saved;
                                    not even within encrypted text.
                                    <br/>
                                    Decryption of a page will fail if the password is incorrect, so whoever can decrypt
                                    the
                                    page must have used the correct password. The idea is that we don't have to know the
                                    password; we just have to make sure that the password is correct - and one way to
                                    check
                                    that is to try decrypting some well-known text using the provided password. The
                                    &quot;well-known&quot;
                                    text we're using is the URL of the current site (which is different, but known, for
                                    each
                                    site).
                                    <br/>
                                    Once a user creates the password, we store the encrypted URL, and each time the
                                    password
                                    needs to be tested, we just try decrypting the encrypted URL. If we get the expected
                                    URL, we try using the same password for decrypting the whole site (it's possible --
                                    but
                                    very unlikely -- that two different passwords correctly decrypt the same URL, but
                                    using
                                    that wrong password for decrypting everything else will result in gibberish).
                                </p>
                            </li>
                            <li>
                                <p class="remove-bottom faq-question"><span class="bold-span">Q:</span> How does
                                    overwrite
                                    protection work? </p>
                                <p class="faq-answer"><span class="bold-span">A:</span>
                                    Overwrite protection prevents you from saving any changes if text was changed in the
                                    meantime. (The server stores the hash of the newest content, and sends the hash to
                                    the
                                    client together with the content. The client has to return that same hash when
                                    trying to
                                    save updated content. The server compares both the stored and received hashes to
                                    determinate whether client was served with the latest changes.)
                                </p>
                            </li>
                            <li>
                                <p class="remove-bottom faq-question"><span class="bold-span">Q:</span> How is the title
                                    of
                                    each tab computed? </p>
                                <p class="faq-answer"><span class="bold-span">A:</span>
                                    The title of each tab consists of up to 20 characters from the first non-empty line
                                    of
                                    text.
                                </p>
                            </li>
                            <li>
                                <p class="remove-bottom faq-question"><span class="bold-span">Q:</span> What encryption
                                    algorithms are used? </p>
                                <p class="faq-answer"><span class="bold-span">A:</span>
                                    {{config('app.domain')}} uses standard AES algorithm for encrypting/decrypting the
                                    content,
                                    together with 'salts' and other known good practices to achieve exceptional
                                    security;
                                    and SHA512 algorithm for hashing. On top of that, all data is only provided through
                                    SSL.
                                </p>
                            </li>

                            <li>
                                <p class="remove-bottom faq-question"><span class="bold-span">Q:</span> Is the server
                                    code
                                    available somewhere? I'd like to host the service myself. </p>
                                <p class="faq-answer"><span class="bold-span">A:</span>
                                    We haven't opened the server code, for now. We'd like to provide perfect security to
                                    everyone, not just tech users. So we've created this approach where server side is
                                    irrelevant - that's the beauty of this service.
                                    <br/>
                                    Nobody should be forced to trust anyone in order to be secure; that's why all
                                    security
                                    is provided from the client side (which users can verify). Even if you knew the
                                    server
                                    code, you couldn't confirm whether that code was running on server, or if it was
                                    replaced by something else. In other words: whenever a server's code is responsible
                                    for
                                    providing security, you have to trust whoever runs it.
                                </p>
                            </li>
                            <li>
                                <p class="remove-bottom faq-question"><span class="bold-span">Q:</span> How long do you
                                    keep
                                    sites on your servers? Will they ever expire? </p>
                                <p class="faq-answer"><span class="bold-span">A:</span>
                                    Sites aren't deleted automatically. We'll keep them until you delete them yourself.
                                </p>
                            </li>
                            <li>
                                <p class="remove-bottom faq-question"><span class="bold-span">Q:</span> Is there a
                                    length
                                    limit? </p>
                                <p class="faq-answer"><span class="bold-span">A:</span>
                                    The current maximum length is a bit more then 750 000 chars per page.
                                </p>
                            </li>
                            <li>
                                <p class="remove-bottom faq-question"><span class="bold-span">Q:</span> Is there some
                                    kind
                                    of self-destruct mechanism? </p>
                                <p class="faq-answer"><span class="bold-span">A:</span>
                                    All that we have are encrypted versions of notes that you store on our servers, so
                                    once
                                    you delete your notes, that's it; there is nothing more to destroy.
                                </p>
                            </li>
                        </div>
                        <a href="#" id="show-more">show more...</a>
                        <a href="#" id="show-less">Hide FAQ</a>
                    </ol>
                </div>
                @if($settings->get('show_share_buttons'))
                    <div class="sixteen columns">
                        <div id="sharing-instruction" class="clearfix">
                            <p class="remove-bottom"> Click to enable sharing </p>
                        </div>
                        <div id="soc-buttons">
                            <img alt="social share" src="{{asset('assets/images/socbuttons.png')}}"/>
                        </div>
                    </div>
                @endif
            </div>
        </div>
        <div class="homepage-hline-lighter"></div>
        <div id="homepage-third-div">
            <div class="container sixteen columns">

                <p class="remove-bottom">
                    Free online notepad on the web. {{$settings->get('app_name',config('app.name'))}} is a secure
                    notepad with password, so it's easy to
                    store
                    notes online without having to login. <br> It's simple and secure free web notepad without ads.
                </p>
                <p class="remove-bottom">
                    If you have any comments, or suggestions - feel free to <a id="contact-us-email">email us</a>.
                </p>
                <p class="remove-bottom">
                    Warrant Canary: <span class="italic-span">{{$settings->get('app_name',config('app.name'))}} has never been served with a warrant that wasn't cleared or dismissed. ProtectedText never had seizures.</span>
                </p>
                <p class="remove-bottom"> &copy; 2013-
                    <script type="text/javascript">document.write(new Date().getFullYear());</script>
                    {{$settings->get('app_domain',config('app.domain'))}}
                </p>
            </div>
            <div class="container columns">
                <p class="remove-bottom">
                    <a style="color: white" href="{{pageUrlWhereName('faq')}}">FAQ</a>
                    <a style="color: white" href="{{pageUrlWhereName('about')}}">About as</a>
                    <a style="color: white" href="{{pageUrlWhereName('privacy')}}">Privacy</a>
                </p>
            </div>
        </div>
    </div>

    <!-- Toaster -->
    <div id="outer-toast">
        <div id="toast"></div>
    </div>
    <!-- Loader -->
    <div id="loader" class="displaynone ui-widget-overlay">
        <img src="{{asset('assets/images/loader.gif')}}" alt="loader gif"/>
    </div>
    @push('js')
        <script type="text/javascript">

            // init function - called once page is loaded
            $(function () {

                // GUI initialization

                // hide 'loading...'
                $("#loadingdiv").remove();
                $("#wholesite").removeClass("displaynone");

                $("#button-go").button().click(function () {
                    window.location = "/" + $("#siteToVisit").val();
                });
                $("#siteToVisit").focus();
                $("#siteToVisit").keypress(function (e) {
                    if (e.which == 13) {
                        $("#button-go").click();
                        e.preventDefault();
                    }
                });

                $("#contact-us-email").attr("href", "mailto:" + "{{config('mail.from.address')}}");

                $("#show-less").hide();
                $("#faq-more").hide();
                $("#show-more").click(function (event) {
                    event.preventDefault();
                    $("#show-more").hide();
                    $("#show-less").show();
                    $("#faq-more").slideDown();
                });
                $("#show-less").click(function (event) {
                    event.preventDefault();
                    $("#show-less").hide();
                    $("#show-more").show();
                    $("#faq-more").slideUp();
                });

                var enableSharing = function () {
                    $("#sharing-instruction").remove();
                    $("#soc-buttons img ").remove();
                    var socialString = "<div class='addthis_toolbox addthis_default_style addthis_32x32_style'><a class='addthis_button_preferred_1'></a><a class='addthis_button_preferred_2'></a><a class='addthis_button_preferred_3'></a><a class='addthis_button_preferred_4'></a><a class='addthis_button_compact'></a></div>";
                    $("#soc-buttons").html(socialString);
                };
                $("#sharing-instruction p").click(enableSharing);
                $("#soc-buttons img").click(enableSharing);

            });
        </script>
    @endpush
</x-app-layout>
