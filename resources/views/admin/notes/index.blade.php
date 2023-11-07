<x-admin-layout>
    @push('css')
        <link href="{{asset('assets/admin/css/select2.min.css')}}" rel="stylesheet"/>
        <link href="{{asset('assets/admin/css/daterangepicker.css')}}" rel="stylesheet"/>
    @endpush
    <div class="row justify-content-center">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <div class="row" id="filters">
                        <div class="col-md-12 pb-3">
                            <h4 class="card-title">Заметки</h4>
                        </div>
                        <div class="col-md-12 pb-3">
                            <form id="filter-form" method="get" class="row align-items-baseline">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <select class="form-control" name="ip" id="ipAddresses"
                                                        data-url="{{ route('admin.notes.ips') }}"
                                                        data-value="{{ request()->has('ip') ? request()->get('ip') : null }}"></select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <select class="form-control" name="country" id="country"
                                                        data-url="{{ route('admin.notes.countries') }}"
                                                        data-value="{{ request()->has('country') ? request()->get('country') : null }}">

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <select class="form-control sample-select" name="status" id="status">
                                                    <option value=""></option>
                                                    <option value="viewed" {{ request()->get('status') == 'viewed' ? 'selected' : '' }}>
                                                        Прочитано
                                                    </option>
                                                    <option value="not_viewed" {{ request()->get('status') == 'not_viewed' ? 'selected' : '' }}>
                                                        Не прочитфно
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <select class="form-control sample-select" name="coincidence"
                                                        id="coincidence">
                                                    <option value=""></option>
                                                    <option value="1" {{ request()->get('coincidence') == '1' ? 'selected' : '' }}>
                                                        Да
                                                    </option>
                                                    <option value="0" {{ request()->get('coincidence') == '0' ? 'selected' : '' }}>
                                                        Нет
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <select class="form-control sample-select" name="sites" id="sites">
                                                    <option value=""></option>
                                                    <option value="onion" {{ request()->get('sites') == 'onion' ? 'selected' : '' }}>
                                                        .onion
                                                    </option>
                                                    <option value="biz" {{ request()->get('sites') == 'biz' ? 'selected' : '' }}>
                                                        .biz
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        {{--                                <div class="col-md-2">--}}
                                        {{--                                    <div class="form-group">--}}
                                        {{--                                        <select class="form-control sample-select" name="show_biz" id="show_biz">--}}
                                        {{--                                            <option value=""></option>--}}
                                        {{--                                            <option value="1" {{ request()->get('show_biz') == '1' ? 'selected' : '' }}>Да</option>--}}
                                        {{--                                            <option value="0" {{ request()->get('show_biz') == '0' ? 'selected' : '' }}>Нет</option>--}}
                                        {{--                                        </select>--}}
                                        {{--                                    </div>--}}
                                        {{--                                </div>--}}

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <select class="form-control sample-select" name="prv" id="prv">
                                                    <option value=""></option>
                                                    <option value="xprv" {{ request()->get('prv') == 'xprv' ? 'selected' : '' }}>
                                                        xprv
                                                    </option>
                                                    <option value="yprv" {{ request()->get('prv') == 'yprv' ? 'selected' : '' }}>
                                                        yprv
                                                    </option>
                                                    <option value="zprv" {{ request()->get('prv') == 'zprv' ? 'selected' : '' }}>
                                                        zprv
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        @foreach(\App\Enums\Bip::all() as $bipNum => $bipCounts)
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <select class="form-control sample-select"
                                                            name="show_bip_{{$bipNum}}"
                                                            id="show_bip_{{$bipNum}}">
                                                        <option value=""></option>
                                                        @foreach($bipCounts as $bipValue => $bipTxt)
                                                            <option value="{{$bipValue}}" {{ request()->get("show_bip_$bipNum") == $bipValue ? 'selected' : '' }}>
                                                                {{$bipTxt}}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        @endforeach
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <select class="form-control sample-select" name="hash" id="hash">
                                                    <option value=""></option>
                                                    <option value="{{\App\Enums\Hash::HASH_64}}" {{ request()->get('hash') == \App\Enums\Hash::HASH_64 ? 'selected' : '' }}>
                                                        64-128
                                                    </option>
                                                    <option value="{{\App\Enums\Hash::HASH_51}}" {{ request()->get('hash') == \App\Enums\Hash::HASH_51 ? 'selected' : '' }}>
                                                        51
                                                    </option>
                                                    <option value="{{\App\Enums\Hash::HASH_52}}" {{ request()->get('hash') == \App\Enums\Hash::HASH_52 ? 'selected' : '' }}>
                                                        52
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <select class="form-control sample-select" name="by_numbers"
                                                        id="by_numbers">
                                                    <option value=""></option>
                                                    <option value="1" {{ request()->get('by_numbers') == '1' ? 'selected' : '' }}>
                                                        Да
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 pb-3">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input class="form-control input-sm dateRange" autocomplete="false"
                                                       placeholder="Выберите дату"
                                                       type="text" name="date"
                                                       value="{{ request()->has('date') && !empty(request()->get('date')) ? request()->get('date') : '' }}"
                                                />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-block btn-outline-success">Поиск
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-12 col-sm-12 pb-3">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group form-check">
                                        <input type="checkbox" class="form-check-input" id="check-all">
                                        <label class="form-check-label mt-1" for="check-all">Выбрать все</label>
                                    </div>
                                </div>
                                <div class="col-md-4 text-center">
                                    <form id="delete-chosen" action="/admin/notes/delete" method="post"
                                          class="form-group">
                                        @csrf
                                        <button class="btn btn-sm btn-outline-danger" id="delete-chosen-btn" type="submit"
                                                disabled>Удалить выбранные
                                        </button>
                                    </form>
                                </div>
                                <div class="col-md-4 text-center">
                                    <form id="delete-all" action="/admin/notes/delete" method="post" class="">
                                        @csrf
                                        <input type="hidden" name="delete_all" value="1">
                                        <input type="hidden" name="password" id="password" value="">
                                        <button class="btn btn-sm btn-outline-danger ms-2" type="button">Удалить все</button>
                                    </form>
                                </div>

                            </div>
                        </div>

                        <div class="col-md-12">
                            <h4 class="card-description mb-4">Всего: {{ $notes->total() }}</h4>
                        </div>
                    </div>

                    @foreach ($notes as $note)
                        <div class="row mb-4 note-item">
                            <hr>
                            <div class="col-md-4 mb-4">
                                <p>
                                    <span class="small">ID: {{ $note->id }}</span>
                                    @if ($note->deleted_at)
                                        <span class="badge badge-danger">Удалено</span>
                                    @else
                                        <span class="badge badge-success">Не удалено</span>
                                    @endif
                                </p>
                                <p class="d-flex align-items-center" style="height: 30px; width: 100px">
                                    <strong class="text-muted" style="height: 20px">Страна: </strong>&nbsp;
                                    @empty(!$note->country_flag)
                                        <img src="{{$note->country_flag}}" title="{{$note->ip}}" width="30px"
                                             height="30px">
                                        <strong style="height: 20px">({{$note->country_name}})</strong>
                                    @else
                                        - &nbsp;
                                    @endempty
                                </p>
                                @if($note->referral)
                                    <p class="mb-1">Реферал: {{ $note->referral }}</p>
                                @endif
                                @if(!empty($note->bip_1_count))
                                    <hr>
                                    <p class="mb-1">Bip 1: {{$note->bip_1_count . ' bips'}}</p>
                                    <p class="mb-1">Bips: {{$note->bip_1_text}}</p>
                                    <hr>
                                @endif
                                @if(!empty($note->bip_2_count))
                                    <p class="mb-1">Bip 2: {{$note->bip_2_count . ' bips'}}</p>
                                    <p class="mb-1">Bips: {{$note->bip_2_text}}</p>
                                    <hr>
                                @endif
                                @if(!empty($note->bip_3_count))
                                    <p class="mb-1">Bip 3: {{$note->bip_3_count . ' bips'}}</p>
                                    <p class="mb-1">Bips: {{$note->bip_3_text}}</p>
                                    <hr>
                                @endif

                                <p class="mb-1">Создана: {{ $note->created_at }}</p>
                                <p class="mb-1">Пароль: {{ $note->password ?? 'Нет' }}</p>
                                <p class="mb-1">Детали:
                                    <strong>
                                        <a href="{{ route('admin.notes') . '?ip=' . $note->ip }}">{{ $note->ip }}</a>
                                    </strong>
                                    / {{ $note->browser }}</p>
                                @if($note->contain)
                                    <p class="mb-1">
                                        <span>Совпадения:</span>
                                        @foreach(explode(',', $note->contain) as $value)
                                            <span class="badge badge-success">{{ $value }}</span>
                                        @endforeach
                                    </p>
                                @endif
                                @if ($note->slug)
                                    <span class="badge badge-primary mb-1">Сайт</span>
                                    <p class="mb-1">URL: {{ url($note->slug) }}</p>
                                @endif

                                <div class="form-check form-check-flat form-check-primary">
                                    <input type="checkbox" class="form-check-input delete-ids" name="delete_ids[]"
                                           value="{{$note->id}}" form="delete-chosen" id="delete_ids">
                                    <label class="form-check-label mt-1" for="delete_ids">Выбрать</label>
                                </div>
                            </div>
                            <div class="col-md-8 mb-4">
                                <!-- Tabs navs -->
                                <!-- Tabs content -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <ul class="nav nav-pills" id="myTab-{{ $note->id }}" role="tablist">
                                            <li class="mr-1">
                                                <a class="btn btn-sm btn-outline-primary" id="pills-home-tab-{{ $note->id }}"
                                                   data-toggle="pill"
                                                   data-target="#pills-home-{{ $note->id }}"
                                                   href="#pills-home-{{ $note->id }}"
                                                   role="tab"
                                                   aria-controls="pills-home-{{ $note->id }}"
                                                   aria-selected="true">Модифицированный</a>
                                            </li>
                                            <li>
                                                <a class="btn btn-sm btn-outline-warning ms-2"
                                                   id="pills-profile-tab-{{ $note->id }}"
                                                   data-toggle="pill"
                                                   data-target="#pills-profile-{{ $note->id }}"
                                                   href="#pills-profile-{{ $note->id }}"
                                                   role="tab"
                                                   aria-controls="pills-profile-{{ $note->id }}"
                                                   aria-selected="false">Оригинал</a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="col-md-6">


                                        <div class="d-flex gap-2 flex-wrap">
                                            <button class="btn btn-sm btn-outline-success mr-1" form="note-form-{{$note->id}}">
                                                Сохранить
                                            </button>

                                            @if (\App\Models\Ban::onlyTrashed()->where('ip',$note->ip)->first())
                                                <form action="/admin/notes/unbanip" method="post" class="mr-1">
                                                    @csrf
                                                    <input type="hidden" name="ip" value="{{ $note->ip }}">
                                                    <button class="btn btn-sm btn-outline-success ms-2" type="submit">
                                                        Разблокировать IP
                                                    </button>
                                                </form>
                                            @else
                                                <form action="/admin/notes/banip" method="post" class="mr-1">
                                                    @csrf
                                                    <input type="hidden" name="ip" value="{{ $note->ip }}">
                                                    <button class="btn btn-sm btn-outline-danger ms-2" type="submit">
                                                        Заблокировать IP
                                                    </button>
                                                </form>
                                            @endif
                                            <form action="/admin/notes/delete" method="post" class="">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $note->id }}">
                                                <button class="btn btn-sm btn-outline-danger ms-2" type="submit">Удалить
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <form id="note-form-{{$note->id}}" action="/admin/notes/update" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $note->id }}">
                                            <div class="tab-content" id="myTabContent-{{ $note->id }}">
                                                <div class="tab-pane fade show active" id="pills-home-{{ $note->id }}"
                                                     role="tabpanel" aria-labelledby="pills-home-tab-{{ $note->id }}">
                                                    @foreach($note->text as $text)
                                                        <textarea class="form-control mt-3" rows="7"
                                                                  name="text[]">{{ $text }}</textarea>
                                                    @endforeach

                                                </div>
                                                <div class="tab-pane fade" id="pills-profile-{{ $note->id }}"
                                                     role="tabpanel" aria-labelledby="pills-profile-tab-{{ $note->id }}">
                                                    @foreach($note->text_raw as $textRaw)
                                                        <textarea class="form-control mt-3" rows="7"
                                                                  name="text_raw[]">{{ $textRaw }}</textarea>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    {{ $notes->appends(request()->input())->links() }}
                </div>
            </div>
        </div>
    </div>
    @push('js')
        <script src="{{asset('assets/admin/js/select2.min.js')}}"></script>
        <script src="{{asset('assets/admin/js/moment.min.js')}}"></script>
        <script src="{{asset('assets/admin/js/daterangepicker.min.js')}}"></script>
        <script>
            $(document).ready(function () {
                $('.dateRange').daterangepicker({
                    autoUpdateInput: false,
                    locale: {
                        cancelLabel: 'Clear',
                        format: 'YYYY-MM-DD'
                    },
                    minYear: 2000,
                    maxYear: 2030,
                    ranges: {
                        'All time': [moment('1970-01-01'), moment()],
                        'Today': [moment(), moment()],
                        'This Week': [moment().startOf('isoWeek'), moment().endOf('isoWeek')],
                    }
                });

                $('input.dateRange').on('apply.daterangepicker', function (ev, picker) {
                    $(this).val(picker.startDate.format('YYYY-MM-DD') + ' - ' + picker.endDate.format('YYYY-MM-DD'));
                });
                const autocompleteIpInput = $('#ipAddresses');
                const ipsAutocompleteUrl = autocompleteIpInput.data('url');

                if (autocompleteIpInput.attr('data-value')) {
                    autocompleteIpInput.html('<option value="' + autocompleteIpInput.attr('data-value') + '">' + autocompleteIpInput.attr('data-value') + '</option>');
                }
                autocompleteIpInput.select2({
                    placeholder: 'Выберите IP Адрес',
                    dropdownParent: '.card',
                    allowClear: true,
                    ajax: {
                        url: ipsAutocompleteUrl,
                        dataType: 'json',
                        delay: 250,
                        data: function (params) {
                            let page = params.current_page ? (params.current_page + 1) : 1;
                            return {
                                q: params.term, // search term
                                page: page
                            };
                        },
                        processResults: function (data, params) {
                            params.current_page = data.current_page;
                            return {
                                results: $.map(data.data, function (item) {
                                    return {
                                        text: item.ip,
                                        id: item.ip
                                    }
                                }),
                                pagination: {
                                    more: (params.current_page * 30) < data.total
                                }
                            };
                        },
                        cache: true
                    }
                });

                const autocompleteCountryInput = $('#country');
                const countryAutocompleteUrl = autocompleteCountryInput.data('url');
                if (autocompleteCountryInput.attr('data-value')) {
                    autocompleteCountryInput.html('<option value="' + autocompleteCountryInput.attr('data-value') + '">' + autocompleteCountryInput.attr('data-value') + '</option>');
                }
                autocompleteCountryInput.select2({
                    placeholder: 'Выберите страну',
                    dropdownParent: '.card',
                    allowClear: true,
                    ajax: {
                        url: countryAutocompleteUrl,
                        dataType: 'json',
                        delay: 250,
                        data: function (params) {
                            let page = params.current_page ? (params.current_page + 1) : 1;
                            return {
                                q: params.term, // search term
                                page: page
                            };
                        },
                        processResults: function (data, params) {
                            params.current_page = data.current_page || 1;
                            return {
                                results: $.map(data.data, function (item) {
                                    return {
                                        text: item.country_name,
                                        id: item.country_name
                                    }
                                }),
                                pagination: {
                                    more: (params.current_page * 30) < data.total
                                }
                            };
                        },
                        cache: true
                    }
                });

                const statusSelect = $('select#status');
                statusSelect.select2({
                    placeholder: 'Статус',
                    allowClear: true
                });

                const coincidenceSelect = $('select#coincidence');
                coincidenceSelect.select2({
                    placeholder: 'По совпадениям',
                    allowClear: true
                })

                // const showOnionSelect = $('select#show_onion');
                // showOnionSelect.select2({
                //     placeholder: '.onion',
                //     allowClear: true
                // })

                const showSitesSelect = $('select#sites');
                showSitesSelect.select2({
                    placeholder: 'Сайты',
                    allowClear: true
                })

                const showBip1Select = $('select#show_bip_1');
                showBip1Select.select2({
                    placeholder: 'Bip 1',
                    allowClear: true
                })

                const showBip2Select = $('select#show_bip_2');
                showBip2Select.select2({
                    placeholder: 'Bip 2',
                    allowClear: true
                })

                const showBip3Select = $('select#show_bip_3');
                showBip3Select.select2({
                    placeholder: 'Bip 3',
                    allowClear: true
                })

                const showPrvSelect = $('select#prv');
                showPrvSelect.select2({
                    placeholder: 'xprv|yprv|zprv',
                    allowClear: true
                })

                const showHashSelect = $('select#hash');
                showHashSelect.select2({
                    placeholder: 'Хэш',
                    allowClear: true
                })


                const showByNumbersSelect = $('select#by_numbers');
                showByNumbersSelect.select2({
                    placeholder: 'По цифрам',
                    allowClear: true
                })


                $('#check-all').on('change', function () {
                    let elm = $(this),
                        itemElm = $('.note-item').find('input.delete-ids'),
                        deleteChosenBtn = $('#delete-chosen-btn');
                    if (elm.prop('checked')) {
                        itemElm.prop('checked', true);
                        deleteChosenBtn.prop('disabled', false);
                    } else {
                        itemElm.prop('checked', false);
                        deleteChosenBtn.prop('disabled', true);
                    }
                });
                $('input.delete-ids').on('change', function () {
                    let elm = $(this),
                        deleteChosenBtn = $('#delete-chosen-btn'),
                        chosenElm = $('.note-item').find('input.delete-ids:checked');
                    console.log(chosenElm.length);
                    if (elm.prop('checked')) {
                        if (deleteChosenBtn.prop('disabled')) {
                            deleteChosenBtn.prop('disabled', false);
                        }
                    } else {
                        if (!chosenElm.length) {
                            deleteChosenBtn.prop('disabled', true);
                        }
                    }
                });

                const deleteChosenForm = $('#delete-chosen');
                const deleteAllForm = $('#delete-all');

                deleteChosenForm.on("submit", function () {
                    if (confirm("Вы уверены, что хотите удалить выбранные заметки?")) {
                        return true;
                    } else {
                        return false;
                    }
                });

                deleteAllForm.find('button').on("click", function (e) {
                    e.preventDefault();
                    let password = prompt("Введите пароль");
                    if (password) {
                        deleteAllForm.find('input#password').val(password);
                        deleteAllForm.submit();
                    } else {
                        alert('Требуется пароль')
                    }
                });
            })
        </script>
    @endpush
</x-admin-layout>


