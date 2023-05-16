@extends('layouts.main')

@section('pagecontent')
    <div class="container">
        <div class="row justify-content-center">
            <legend class="text-4xl text-black text-center">ORDER/POS</legend>
        </div>
        <div class=" uk-card uk-card-default uk-card-body">
            <div class=" inset-0  flex  items-center justify-center">
                <div class="bg-white rounded-lg shadow p-4" x-data="app()">
                    <div class="font-thin px-2 pb-4 text-lg">Enter your pin code</div>
                    <div class="flex">
                        <template x-for="(l,i) in pinlength" :key="`codefield_${i}`">
                            <input :autofocus="i == 0" :id="`codefield_${i}`"
                                class="h-16 w-12 border mx-2 rounded-lg flex items-center text-center font-thin text-3xl"
                                value="" maxlength="1" max="9" min="0" inputmode="decimal"
                                type="password" @keyup="stepForward(i)" @keydown.backspace="stepBack(i)"
                                @focus="resetValue(i)"></input>
                        </template>
                    </div>
                </div>
            </div>
            <div class="uk-card uk-card-default uk-card-body text-center mt-10">
                <div class="grid grid-cols-3 pb-5">
                    <div class="col-span-1 mb-5"><button type="" class="bg-blue-200 w-40 rounded-2xl p-5">
                            1
                        </button>
                    </div>
                    <div class="col-span-1 mb-5"><button type="" class="bg-blue-200 w-40 rounded-2xl p-5">
                            2
                        </button>
                    </div>
                    <div class="col-span-1 mb-5"><button type="" class="bg-blue-200 w-40 rounded-2xl p-5">
                            3
                        </button>
                    </div>
                </div>
                <div class="grid grid-cols-3 pb-5">
                    <div class="col-span-1 mb-5"><button type="" class="bg-blue-200 w-40 rounded-2xl p-5">
                            4
                        </button>
                    </div>
                    <div class="col-span-1 mb-5"><button type="" class="bg-blue-200 w-40 rounded-2xl p-5">
                            5
                        </button>
                    </div>
                    <div class="col-span-1 mb-5"><button type="" class="bg-blue-200 w-40 rounded-2xl p-5">
                            6
                        </button>
                    </div>
                </div>

                <div class="grid grid-cols-3 pb-5">
                    <div class="col-span-1 mb-5"><button type="" class="bg-blue-200 w-40 rounded-2xl p-5">
                            7
                        </button>
                    </div>
                    <div class="col-span-1 mb-5"><button type="" class="bg-blue-200 w-40 rounded-2xl p-5">
                            8
                        </button>
                    </div>
                    <div class="col-span-1 mb-5"><button type="" class="bg-blue-200 w-40 rounded-2xl p-5">
                            9
                        </button>
                    </div>
                </div>

                <div class="grid grid-cols-3 pb-5">
                    <div class="col-span-1 mb-5"><button type="" class="bg-blue-200 w-40 rounded-2xl p-5">
                            CLEAR
                        </button>
                    </div>
                    <div class="col-span-1 mb-5"><button type="" class="bg-blue-200 w-40 rounded-2xl p-5">
                            0
                        </button>
                    </div>
                    <div class="col-span-1 mb-5"><button type="" class="bg-blue-200 w-40 rounded-2xl p-5">
                            BACK
                        </button>
                    </div>
                </div>



            </div>

            <script type="text/javascript">
                function app() {
                    return {
                        pinlength: 4,
                        resetValue(i) {
                            for (x = 0; x < this.pinlength; x++) {
                                if (x >= i) document.getElementById(`codefield_${x}`).value = ''
                            }
                        },
                        stepForward(i) {
                            if (document.getElementById(`codefield_${i}`).value && i != this.pinlength - 1) {
                                document.getElementById(`codefield_${i+1}`).focus()
                                document.getElementById(`codefield_${i+1}`).value = ''
                            }
                            this.checkPin()
                        },
                        stepBack(i) {
                            if (document.getElementById(`codefield_${i-1}`).value && i != 0) {
                                document.getElementById(`codefield_${i-1}`).focus()
                                document.getElementById(`codefield_${i-1}`).value = ''
                            }
                        },
                        checkPin() {
                            let code = ''
                            for (i = 0; i < this.pinlength; i++) {
                                code = code + document.getElementById(`codefield_${i}`).value
                            }
                            if (code.length == this.pinlength) {
                                this.validatePin(code)
                            }
                        },
                        validatePin(code) {
                            // Check pin on server
                            if (code == '1234') alert('success')
                        }
                    }
                }
            </script>
        </div>
    </div>
@endsection
