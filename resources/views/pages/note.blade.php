<x-app-layout>
    <x-slot name="seo_title">{{ltrim($note['slug'],'/')}} - {{$settings->get('app_name',config('app.name'))}}</x-slot>
    <div class="container" id="loadingdiv">
        <p id="loadingtext">Loading...</p>
    </div>
    <div class="displaynone" id="wholesite">
        <div id="menubar">
            <div class="container">
                <div class="sixteen columns">
                    <div class="four columns alpha" id="logo-img-div">
                        <a href="{{pageUrlWhereName('home')}}"><img alt="logo" src="{{asset('assets/images/logo.png')}}"
                                                                    id="logo-img"></a>
                    </div>
                    <div class="twelve columns omega" id="menubar-buttons">
                        <button class="remove-bottom" id="button-delete">Delete</button>
                        <button class="remove-bottom" id="button-savenew">Change password</button>
                        <button class="remove-bottom" id="button-save">Save</button>
                        <button class="remove-bottom" id="button-reload">Reload</button>
                        <a href="{{pageUrlWhereName('helpusfight')}}">
                            <img class="android-app-icon" alt="help us fight"
                                 src="{{asset('assets/images/fight-hand-text-icon.png')}}"/>
                        </a>
                        <a href="https://play.google.com/store/apps/details?id=com.protectedtext.android">
                            <img class="android-app-icon" alt="app icon"
                                 src="{{asset('assets/images/android-app-icon.png')}}"/>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div id="main-content-outter">
            <div class="container">
                <div class="sixteen columns">
                    <div id="tabs">
                        <!-- content of this "#tabs" is overridden from main.js with the same content, right after the site loads. -->
                        <ul>
                            <li><a href="#tabs-0">Empty Tab</a><span class="ui-icon ui-icon-close" role="presentation">Remove Tab</span>
                            </li>
                            <button id="add_tab">+</button>
                        </ul>
                        <div id="tabs-0">
                        <textarea rows="1" cols="1" class="textarea-contents"
                                  placeholder="your text goes here ..."></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Dialogs -->
    <div id="dialog-new-site" class="displaynone" title="Create new site?">
        <p> Great! This site doesn't exist, it can be yours! Would you like to create:</p>
        <p class="dialog-site-name"> {{ltrim($note['slug'],'/')}} </p>
    </div>
    <div id="dialog-site-modified" class="displaynone" title="Site was modified in the meantime!">
        <p class="comment">This can happen if the site was open in two different
            browser tabs, or if someone else changed the site in the
            meantime, or if your Internet connection is intermittent. </p>
        <p>To prevent any data loss:</p>
        <ol>
            <li><strong>back up</strong> your changes to some text editor,</li>
            <li><strong>reload</strong> the site to get latest modification,</li>
            <li><strong>reapply</strong> your changes.</li>
        </ol>
    </div>
    <div id="dialog-confirm-reload" class="displaynone" title="Are you sure?">
        <p> Reloading will abandon your changes. Make sure you've backed up your text.</p>
    </div>
    <div id="dialog-confirm-delete-site" class="displaynone" title="Delete this site?">
        <p> Are you sure you want to permanently delete this site?</p>
        <p> This action can't be undone.</p>
    </div>
    <div id="dialog-confirm-delete-tab" class="displaynone" title="Delete this tab?">
        <p> Are you sure?</p>
    </div>
    <div id="dialog-password" class="displaynone" title="Password required">
        <p class="comment">This site (this URL) is already occupied.<br> If this is your site enter the password, or you
            can
            try using <a href="{{pageUrlWhereName('home')}}">different site</a>.</p>
        <p class="additional-text remove-bottom">Try different password,</p>
        <p class="additional-text">or go to <a href="{{pageUrlWhereName('home')}}">homepage</a>.</p>
        <form onsubmit="return false">
            <fieldset>
                <label for="enterpassword">Password used to encrypt this site:</label>
                <input type="password" name="enterpassword" id="enterpassword" value=""
                       class="text ui-widget-content ui-corner-all"/>
            </fieldset>
        </form>
    </div>
    <div id="dialog-new-password" class="displaynone">
        <p class="additional-text remove-bottom">Enter new password and click Save.</p>
        <p class="comment">Make sure to remember the password. We don't store passwords, just the encrypted data. (If
            the
            password is forgotten, the data can't be accessed.)<br> Longer passwords are more secure. </p>
        <p id="passwords-dont-match" class="displaynone"> Passwords don't match.</p>
        <p id="passwords-empty" class="displaynone"> Must be at least one characters long.</p>
        <form onsubmit="return false">
            <fieldset>
                <label for="newpassword1">Password</label>
                <input type="password" name="newpassword1" id="newpassword1" value=""
                       class="text ui-widget-content ui-corner-all"/>
                <label for="newpassword2">Repeat password</label>
                <input type="password" name="newpassword2" id="newpassword2" value=""
                       class="text ui-widget-content ui-corner-all"/>
            </fieldset>
        </form>
    </div>
    <!-- Toaster -->
    <div id="outer-toast">
        <div id="toast"></div>
    </div>
    <!-- Loader -->
    <div id="loader" class="displaynone ui-widget-overlay">
        <img src="{{asset('assets/images/loader.gif')}}" alt="loader-gif"/>
    </div>

    @push('js')
        <script type="text/javascript" src="{{asset('assets/js/sha512.js')}}"></script> <!-- lib SHA-512 -->
        <script type="text/javascript" src="{{asset('assets/js/aes.js')}}"></script> <!-- lib for AES -->

        <script type="text/javascript" src="{{asset('assets/js/main.js')}}"></script>
        <!-- main JS file for ProtectedText.com -->
        <script type="text/javascript">
            const data = @json($note);
            var state;
            var createState = function () {
                /* data from server is stored in 'state' object */
                state = new ClientState(data.slug, data.encryptedContent, data.isNew, data.currentDBVersionArg, data.expectedDBVersionArg);
            }
        </script>
    @endpush
</x-app-layout>
