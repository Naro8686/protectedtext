<x-app-layout>
    @push('css')
        <style>
            #content-holder img {
                float: right;
                padding: 20px;
                width: 20%;
                height: auto;
                opacity: 1.0;
            }


            #content-holder {
                /*  background-color: #fff;*/
                /*  border: 1px solid #ccc;*/
                padding: 10px !important;
                color: #242729;
            }

            #content-holder h3, #content-holder p {
                font-family: Segoe UI, Arial, sans-serif;
                font-size: 1.1em;
                line-height: 1.4;

            }

            #content-holder p {
                /*text-indent: 5%*/
            }

            #content-holder h3 {
                padding-top: 30px;
                padding-bottom: 10px;
                font-size: 1.2em;
                font-weight: bold;
                color: #043C6B;
            }

            #content-holder h2 {
                padding-top: 50px;
                padding-bottom: 20px;
                font-size: 1.3em;
                color: #043C6B;
                font-weight: bold;
            }

            #content-holder b {
                font-weight: bold;
                color: #043C6B;
            }

            #content-holder i {
                font-style: italic;
            }

            .centeralign {
                display: block;
                text-align: center;
            }

            .indent {
                margin-left: 5%;
            }


        </style>
    @endpush
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
        <div id="menubar">
            <div class="container">
                <div class="sixteen columns">
                    <div class="four columns alpha">
                        <a href="{{pageUrlWhereName('home')}}"><img alt="logo" src="{{asset('assets/images/logo.png')}}"
                                                     id="logo-img"></a>
                    </div>
                    <div class="twelve columns omega" id="menubar-buttons">
                        <!--button class="remove-bottom" id="button-delete">Delete</button>
                        <button class="remove-bottom" id="button-savenew">Save (new password)</button>
                        <button class="remove-bottom" id="button-save">Save</button>
                        <button class="remove-bottom" id="button-reload">Reload</button-->
                    </div>
                </div>
            </div>
        </div>
        <div id="main-content-outter" style="overflow:auto;"> <!-- adds scroll bars -->
            <div class="container">
                <div class="sixteen columns" id="content-holder">


                    <h2 class="centeralign">What's really going on behind the scene - our fight for user's privacy</h2>

                    <img id="fight-hand" alt="fighting hand" src="{{asset('assets/images/fight-hand.png')}}"/>

                    <p>
                        We decided to share our <b>background story</b>.<br>
                        We strongly believe that an average user shouldn't be concerned with <b>complex legal
                            fighting</b>
                        that's going on
                        behind the scene, since our service is supposed to be:
                        <br>
                        <span class="indent">– easy, free, lightweight, and '<b>just work</b>'</span>.
                    </p>

                    <p>
                        Still, we decided to share <b>more information</b> with those of you want to know the truth, and
                        ask
                        us how to help with the pressure we're enduring.
                    </p>
                    <p>
                        Just to make it clear (<b>TL;DR</b>) – after ten years, we're still fighting, but we're getting
                        tired from this battle, some of us have families and jobs to worry about too, and we wouldn't
                        mind
                        getting a few words of encouragement as well.
                    </p>

                    <h3>Trustless Security</h3>
                    <p>
                        ProtectedText.com was created from the very start to provide <i>Trustless Security</i>, so there
                        was
                        <b>never a weak point</b>
                        to attack our service, neither legally nor with security exploits.
                    </p>
                    <p class="indent">
                        The concept of <i>Trustless Security</i> is based on storage of encrypted data without storage
                        of
                        the password needed to decrypt data.
                        That way <b>neither we nor any hacker or organization</b> can decrypt and access your data,
                        since
                        only you hold the password.
                        That way you don't need to trust anyone, not even us, since your password never leaves your
                        computer.
                    </p>
                    <p class="indent">
                        Still, we're one of the <b>very few</b> online services that uses <i>Trustless Security</i>
                        since
                        there is no concept of users in such a system,
                        and when there are no users, it's hard to generate revenue. So, since almost everyone is in it
                        for
                        the money, they don't use <i>Trustless Security</i>. Also, once you remove the ads (since they
                        can
                        track and identify users), you're only burning money.
                    </p>

                    <h3>We don't judge!</h3>
                    <p>
                        We <b>don't want to</b>, and we never will.
                    </p>
                    <p>
                        We've run into quite a few instances where some legal entity sends us an <i>urgent legal
                            request</i>
                        to hand over information related to <i>xyz</i> person,
                        or a user who accessed the <i>xyz</i> site on protectedtext.com.
                        <br>
                        Which we kindly refused explaining to them that we don't have users and don't (and <b>can't</b>)
                        know anything.
                    </p>
                    <p>
                        So we're <b>helping the 'bad guys'</b>, right?
                        <br>
                        It may seem so at first, but then a few months later, after the recent (ahem, <i>Turkey</i>)
                        elections, the '<i>bad guy</i>' is a prominent member of parliament,
                        and seems to (based on the news we read) really make a positive change.
                        <br>
                        So who defines who is the bad guy? The <b>ones in power</b>, it seems.
                        <br>
                        The real bad guys still have hundred of other ways to encrypt their communication (we're not a
                        communication service), but '<i>good guys</i>'
                        don't really have other <b>lightweight</b> and <b>free</b> solutions to keep their notes and
                        ideas
                        <b>private</b>.
                    </p>
                    <p>
                        We don't want to play the judge.
                        <br>
                        There are other whistleblower services who have the resources to make a sound judgement, but <b>we
                            don't</b>.
                        <br>
                        Still, sometimes we're forced to, and so whole countries end up <b>blocking access to our
                            site</b>
                        just because we don't cooperate.
                        <br>
                        <i>(This situation can be avoided with smart and polite legal dialog and other non-programmer
                            skills
                            that we have to pay for from our own pockets).
                        </i>
                    </p>
                    <p>
                        We don't <b>sell users' data</b>, and we never will; we're not in this for the money.
                        <br>
                        We do fight for our users and we have purposely created our service in such a way that we can't
                        give
                        out our users' data, since it technically <b>just can't be done</b>.
                    </p>
                    <p class="indent">
                        Because we don't hold any password, we can't access users' data, so that <b>those in power</b>
                        also
                        can't access users' data.
                        Unfortunately, this approach has some negative sides, e.g., forgotten passwords cannot be
                        recovered,
                        but there's no way around this.
                    </p>

                    <h3>Ten years of fighting</h3>
                    <p>
                        We've had ten years of perfect service:
                    </p>
                    <p class="indent">Zero <b>hacking attacks</b> got through.
                    </p>
                    <p class="indent">Zero <b>security exploits</b>.
                    </p>
                    <p class="indent">Android app had some usability bugs, but <b>none</b> were security related.
                    </p>
                    <p> When was the last time ProtectedText <b>was down, or unavailable</b>?
                    </p>
                    <p> When was the last time you <b>had to wait</b> for ProtectedText to load since it was slow?
                    </p>
                    <p> When was the last time we had a <b><i>scheduled upgrade</i></b> during which you couldn't access
                        your notes?
                    </p>
                    <p> Can you <b>say the same</b> for other sites you use?
                        <br>
                        We're lucky to have an awesome engineering team, so we don't have issues with our software, <b>it
                            just works</b>, as it should be.
                        <br>
                        Our issues are mostly <b>non-technical</b>.
                        <br>
                        We have to send educated legal responses explaining that we don't have any relation with the
                        person
                        they're after, and that we can't help them.
                        <br>
                        <i>(Which doesn't work very well, since most of them think that software works like in a movie
                            where
                            the main character shouts "I'm in", and suddenly mathematical laws disappear.)
                        </i>
                    </p>
                    <p>
                        We've had situations where whole <b>countries</b> block us for 6 months, because we didn't
                        (couldn't) decrypt some site on our server.
                        <br>
                        Even the UK did this a few times, and it's a regular routine for China nowadays.
                        <br>
                        Still, we're <b>proxy-friendly</b>, so there is a way to get to us.
                    </p>
                    <p>
                        Things get much worse for our servers when they try to take us down with <b>DDOS attack</b>, our
                        servers scale and serve out all the traffic
                        that tries to choke us, but we end up paying for all that traffic.
                    </p>
                    <p>
                        ProtectedText is still <b>the safest</b> platform online for storing your text; that's why we
                        have
                        some prominent whistler-blowers (ahem, Assange)
                        send us thank-you notes (and <i>presumably</i> use our site, but we don't have a way to know for
                        sure). And we'll keep it that way.
                    </p>
                    <p>
                        We managed to keep our <b>anonymity</b> and successfully avoided being trashed on <b>public
                            media</b>.
                        <br>
                        Luckily for us, most news sites are still polite enough to take down articles about us if we ask
                        them kindly.
                    </p>

                    <h3>Why we do it?</h3>
                    <p>
                        Protectedtext.com has grown into a <b>privacy-marvel</b> in todays privacy-deprived world.
                        <br>
                        <i>(Try to name just one website that doesn't use cookies today.)</i>
                    </p>
                    <p>
                        We have <b>high standards</b>, we don't use ads, and we don't access users personal information,
                        or
                        even have users.
                        <br>
                        Why we do it – because it's the <b>right thing to do!</b>
                        <br>
                        Some services are profitable, some services are useful, and those often <b>don't overlap</b>.
                    </p>
                    <p class="indent">
                        What would the internet look like if we only had services that are profitable?
                        <br>
                        We'd lose <b>Wikipedia</b>, <b>Mozilla</b>, the whole <b>Linux</b>-community, etc. And, they are
                        all
                        forced to live on donations nowadays.
                        Unfortunately they also get manipulated by those who give them donations (ahem, Google).
                    </p>

                    <h3>Help with our fight!</h3>
                    <p>
                        We were fighting behind the closed doors, but <b>we can't</b> do this anymore.
                        <br>
                        Financial support we used to get from EFF guys did help us, but we can't depend on them much
                        longer;
                        we have to generate some revenue to pay for <b>lawyers</b>,
                        for <b>DDOS attacks</b>; and to see the <b>end of the tunnel</b>.
                        <br>
                        If we continue emptying our pockets, some of us are going to get divorced very soon...
                        <br>
                        We'd also love to hear from our <b>community</b> a bit more, engage with them a bit more, and be
                        motivated to fight for them.
                    </p>
                    <p>
                        There are very few sites on the web that have the same high standards that we do – not distract
                        the
                        user with ads, and allow completely
                        <b>free</b> service for <b>everyone</b>, even those that abuse our service and create 100 pages
                        per
                        day.
                        <br>
                        <i>(If we were to implement mechanism to detect them, we would be identifying other users as
                            well,
                            which would hurt privacy of our non-abusive users.)
                        </i>
                    </p>
                    <p>
                        If we were to allow users to pay for membership, we'd need users to log into our site, which
                        would
                        <b>identify</b> them.
                        <br>
                        We <b>can't discriminate</b> against whistleblowers that need to be anonymous, since they are
                        the
                        ones that need our service the most.
                    </p>
                    <p>
                        If you just want to use our free service, that's completely fine, we're here to give you the
                        ultimate privacy without any ads or distractions.
                        <br>
                        But if you share our <b>enthusiasm</b> and want to engage with us, contribute and <b>support our
                            fight</b>; we'd be even more excited!
                        <br>
                        We have created a <i>Patreon</i> site <a href="#"><b>www.Patreon.com/ProtectedText</b></a>
                        where you can support us and engage with us.
                        <br>
                        Your help is more than welcome!
                    </p>
                    <p>
                        Help us prevail, keep fighting, and ultimately show others that the internet can be <b>truly
                            free</b> without compromising anyone's privacy!
                    </p>
                    <p class="centeralign">
                        -- Fight for our freedom <b>to be anonymous</b>, and our freedom to help those that <b>need to
                            be</b>. --
                        <br><br><br><br><br><br><br><br><br>
                    </p>

                </div>
            </div>
        </div>
    </div>
    @push('js')
        <script type="text/javascript">
            $(function () {

                $("#loadingdiv").remove();
                $("#wholesite").removeClass("displaynone");

                $("#menubar-buttons button").button({disabled: true});

                // construct tabs
                var tabs = $("#tabs").tabs();
                tabs.find(".ui-tabs-nav").sortable({
                    axis: "x",
                });

                // handle positioning of textarea
                $("body").css("overflow", "hidden");
                //$("#main-content-outter").css("overflow", "hidden");
                var onWindowResize = function () {
                    var computedHeight = $(window).height() - $("#menubar").outerHeight();
                    $("#main-content-outter").css("height", computedHeight);
                    computedHeight = $("#main-content-outter").height() - $("#tabs ul.ui-tabs-nav").outerHeight();
                    $("#tabs div").css("height", computedHeight);
                };
                $(window).resize(onWindowResize);
                onWindowResize();

                var currentTextarea = $("#tabs .ui-tabs-panel[aria-expanded='true'] textarea.textarea-contents");
                currentTextarea.focus();
                currentTextarea.attr("disabled", "true");
            });
        </script>
    @endpush
</x-app-layout>
