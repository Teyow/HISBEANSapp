@extends('layouts.main')

@section('pagecontent')
    <div class="container">
        <div class="row justify-content-center">
            <legend class="text-4xl text-black text-center">Marketing Management</legend>
        </div>
        <div class="flex justify-center">
            <div class="uk-card uk-card-default uk-card-body ml-5 mr-5 mt-10 rounded-xl  w-3/5">
                <legend class="text-center text-black text-2xl pb-10">Add Promotions</legend>
                <div class="js-upload uk-placeholder uk-text-center h-52">
                    <span uk-icon="icon: cloud-upload"></span>
                    <span class="uk-text-middle pt-20">Attach binaries by dropping them here or</span>
                    <div uk-form-custom>
                        <input type="file" multiple>
                        <span class="uk-link">selecting one</span>
                    </div>
                </div>

                <progress id="js-progressbar" class="uk-progress" value="0" max="100" hidden></progress>

                <script>
                    var bar = document.getElementById('js-progressbar');

                    UIkit.upload('.js-upload', {

                        url: '',
                        multiple: true,

                        beforeSend: function() {
                            console.log('beforeSend', arguments);
                        },
                        beforeAll: function() {
                            console.log('beforeAll', arguments);
                        },
                        load: function() {
                            console.log('load', arguments);
                        },
                        error: function() {
                            console.log('error', arguments);
                        },
                        complete: function() {
                            console.log('complete', arguments);
                        },

                        loadStart: function(e) {
                            console.log('loadStart', arguments);

                            bar.removeAttribute('hidden');
                            bar.max = e.total;
                            bar.value = e.loaded;
                        },

                        progress: function(e) {
                            console.log('progress', arguments);

                            bar.max = e.total;
                            bar.value = e.loaded;
                        },

                        loadEnd: function(e) {
                            console.log('loadEnd', arguments);

                            bar.max = e.total;
                            bar.value = e.loaded;
                        },

                        completeAll: function() {
                            console.log('completeAll', arguments);

                            setTimeout(function() {
                                bar.setAttribute('hidden', 'hidden');
                            }, 1000);

                            alert('Upload Completed');
                        }

                    });
                </script>
                <div class="pt-5  flex justify-center text-center pb-5">
                    <a class="  bg-blue-500 text-white rounded-xl p-2 w-40 text-center hover:no-underline hover:text-white hover:bg-slate-400 duration-50"
                        href="">Upload</a>
                </div>
            </div>
        </div>
    </div>
@endsection
