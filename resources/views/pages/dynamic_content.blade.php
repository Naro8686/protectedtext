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
                </div>
            </div>
        </div>
        <div id="main-content-outter" style="overflow:auto;"> <!-- adds scroll bars -->
            <div class="container">
                <div class="sixteen columns" id="content-holder">
                    {!! $page->content !!}
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
