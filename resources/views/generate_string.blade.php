@extends('layout.masterlayout')
@section('content')
    <style>
        body {
            background-color: lightblue;
        }

        #summary {
            background-color: rgb(187, 218, 228);
        }
        #prompt {
            background-color: rgb(187, 218, 228);
        }

        /* HTML: <div class="loader"></div> */
        .loader {
            --w: 10ch;
            font-weight: bold;
            font-family: monospace;
            font-size: 30px;
            line-height: 1.2em;
            letter-spacing: var(--w);
            width: var(--w);
            overflow: hidden;
            white-space: nowrap;
            color: #0000;
            animation: l19 2s infinite linear;
        }

        .loader:before {
            content: "Loading...";
        }

        @keyframes l19 {
            0% {
                text-shadow:
                    calc(0*var(--w)) 0, calc(-1*var(--w)) 0, calc(-2*var(--w)) 0, calc(-3*var(--w)) 0, calc(-4*var(--w)) 0,
                    calc(-5*var(--w)) 0, calc(-6*var(--w)) 0, calc(-7*var(--w)) 0, calc(-8*var(--w)) 0, calc(-9*var(--w)) 0
            }

            4% {
                text-shadow:
                    calc(0*var(--w)) 0 #000, calc(-1*var(--w)) 0, calc(-2*var(--w)) 0, calc(-3*var(--w)) 0, calc(-4*var(--w)) 0,
                    calc(-5*var(--w)) 0, calc(-6*var(--w)) 0, calc(-7*var(--w)) 0, calc(-8*var(--w)) 0, calc(-9*var(--w)) 0
            }

            8% {
                text-shadow:
                    calc(0*var(--w)) 0 #000, calc(-1*var(--w)) 0 #000, calc(-2*var(--w)) 0, calc(-3*var(--w)) 0, calc(-4*var(--w)) 0,
                    calc(-5*var(--w)) 0, calc(-6*var(--w)) 0, calc(-7*var(--w)) 0, calc(-8*var(--w)) 0, calc(-9*var(--w)) 0
            }

            12% {
                text-shadow:
                    calc(0*var(--w)) 0 #000, calc(-1*var(--w)) 0 #000, calc(-2*var(--w)) 0 #000, calc(-3*var(--w)) 0, calc(-4*var(--w)) 0,
                    calc(-5*var(--w)) 0, calc(-6*var(--w)) 0, calc(-7*var(--w)) 0, calc(-8*var(--w)) 0, calc(-9*var(--w)) 0
            }

            16% {
                text-shadow:
                    calc(0*var(--w)) 0 #000, calc(-1*var(--w)) 0 #000, calc(-2*var(--w)) 0 #000, calc(-3*var(--w)) 0 #000, calc(-4*var(--w)) 0,
                    calc(-5*var(--w)) 0, calc(-6*var(--w)) 0, calc(-7*var(--w)) 0, calc(-8*var(--w)) 0, calc(-9*var(--w)) 0
            }

            20% {
                text-shadow:
                    calc(0*var(--w)) 0 #000, calc(-1*var(--w)) 0 #000, calc(-2*var(--w)) 0 #000, calc(-3*var(--w)) 0 #000, calc(-4*var(--w)) 0 #000,
                    calc(-5*var(--w)) 0, calc(-6*var(--w)) 0, calc(-7*var(--w)) 0, calc(-8*var(--w)) 0, calc(-9*var(--w)) 0
            }

            24% {
                text-shadow:
                    calc(0*var(--w)) 0 #000, calc(-1*var(--w)) 0 #000, calc(-2*var(--w)) 0 #000, calc(-3*var(--w)) 0 #000, calc(-4*var(--w)) 0 #000,
                    calc(-5*var(--w)) 0 #000, calc(-6*var(--w)) 0, calc(-7*var(--w)) 0, calc(-8*var(--w)) 0, calc(-9*var(--w)) 0
            }

            28% {
                text-shadow:
                    calc(0*var(--w)) 0 #000, calc(-1*var(--w)) 0 #000, calc(-2*var(--w)) 0 #000, calc(-3*var(--w)) 0 #000, calc(-4*var(--w)) 0 #000,
                    calc(-5*var(--w)) 0 #000, calc(-6*var(--w)) 0 #000, calc(-7*var(--w)) 0, calc(-8*var(--w)) 0, calc(-9*var(--w)) 0
            }

            32% {
                text-shadow:
                    calc(0*var(--w)) 0 #000, calc(-1*var(--w)) 0 #000, calc(-2*var(--w)) 0 #000, calc(-3*var(--w)) 0 #000, calc(-4*var(--w)) 0 #000,
                    calc(-5*var(--w)) 0 #000, calc(-6*var(--w)) 0 #000, calc(-7*var(--w)) 0 #000, calc(-8*var(--w)) 0, calc(-9*var(--w)) 0
            }

            36% {
                text-shadow:
                    calc(0*var(--w)) 0 #000, calc(-1*var(--w)) 0 #000, calc(-2*var(--w)) 0 #000, calc(-3*var(--w)) 0 #000, calc(-4*var(--w)) 0 #000,
                    calc(-5*var(--w)) 0 #000, calc(-6*var(--w)) 0 #000, calc(-7*var(--w)) 0 #000, calc(-8*var(--w)) 0 #000, calc(-9*var(--w)) 0
            }

            40%,
            60% {
                text-shadow:
                    calc(0*var(--w)) 0 #000, calc(-1*var(--w)) 0 #000, calc(-2*var(--w)) 0 #000, calc(-3*var(--w)) 0 #000, calc(-4*var(--w)) 0 #000,
                    calc(-5*var(--w)) 0 #000, calc(-6*var(--w)) 0 #000, calc(-7*var(--w)) 0 #000, calc(-8*var(--w)) 0 #000, calc(-9*var(--w)) 0 #000
            }

            64% {
                text-shadow:
                    calc(0*var(--w)) 0, calc(-1*var(--w)) 0 #000, calc(-2*var(--w)) 0 #000, calc(-3*var(--w)) 0 #000, calc(-4*var(--w)) 0 #000,
                    calc(-5*var(--w)) 0 #000, calc(-6*var(--w)) 0 #000, calc(-7*var(--w)) 0 #000, calc(-8*var(--w)) 0 #000, calc(-9*var(--w)) 0 #000
            }

            68% {
                text-shadow:
                    calc(0*var(--w)) 0, calc(-1*var(--w)) 0, calc(-2*var(--w)) 0 #000, calc(-3*var(--w)) 0 #000, calc(-4*var(--w)) 0 #000,
                    calc(-5*var(--w)) 0 #000, calc(-6*var(--w)) 0 #000, calc(-7*var(--w)) 0 #000, calc(-8*var(--w)) 0 #000, calc(-9*var(--w)) 0 #000
            }

            72% {
                text-shadow:
                    calc(0*var(--w)) 0, calc(-1*var(--w)) 0, calc(-2*var(--w)) 0, calc(-3*var(--w)) 0 #000, calc(-4*var(--w)) 0 #000,
                    calc(-5*var(--w)) 0 #000, calc(-6*var(--w)) 0 #000, calc(-7*var(--w)) 0 #000, calc(-8*var(--w)) 0 #000, calc(-9*var(--w)) 0 #000
            }

            76% {
                text-shadow:
                    calc(0*var(--w)) 0, calc(-1*var(--w)) 0, calc(-2*var(--w)) 0, calc(-3*var(--w)) 0, calc(-4*var(--w)) 0 #000,
                    calc(-5*var(--w)) 0 #000, calc(-6*var(--w)) 0 #000, calc(-7*var(--w)) 0 #000, calc(-8*var(--w)) 0 #000, calc(-9*var(--w)) 0 #000
            }

            80% {
                text-shadow:
                    calc(0*var(--w)) 0, calc(-1*var(--w)) 0, calc(-2*var(--w)) 0, calc(-3*var(--w)) 0, calc(-4*var(--w)) 0,
                    calc(-5*var(--w)) 0 #000, calc(-6*var(--w)) 0 #000, calc(-7*var(--w)) 0 #000, calc(-8*var(--w)) 0 #000, calc(-9*var(--w)) 0 #000
            }

            84% {
                text-shadow:
                    calc(0*var(--w)) 0, calc(-1*var(--w)) 0, calc(-2*var(--w)) 0, calc(-3*var(--w)) 0, calc(-4*var(--w)) 0,
                    calc(-5*var(--w)) 0, calc(-6*var(--w)) 0 #000, calc(-7*var(--w)) 0 #000, calc(-8*var(--w)) 0 #000, calc(-9*var(--w)) 0 #000
            }

            88% {
                text-shadow:
                    calc(0*var(--w)) 0, calc(-1*var(--w)) 0, calc(-2*var(--w)) 0, calc(-3*var(--w)) 0, calc(-4*var(--w)) 0,
                    calc(-5*var(--w)) 0, calc(-6*var(--w)) 0, calc(-7*var(--w)) 0 #000, calc(-8*var(--w)) 0 #000, calc(-9*var(--w)) 0 #000
            }

            92% {
                text-shadow:
                    calc(0*var(--w)) 0, calc(-1*var(--w)) 0, calc(-2*var(--w)) 0, calc(-3*var(--w)) 0, calc(-4*var(--w)) 0,
                    calc(-5*var(--w)) 0, calc(-6*var(--w)) 0, calc(-7*var(--w)) 0, calc(-8*var(--w)) 0 #000, calc(-9*var(--w)) 0 #000
            }

            96% {
                text-shadow:
                    calc(0*var(--w)) 0, calc(-1*var(--w)) 0, calc(-2*var(--w)) 0, calc(-3*var(--w)) 0, calc(-4*var(--w)) 0,
                    calc(-5*var(--w)) 0, calc(-6*var(--w)) 0, calc(-7*var(--w)) 0, calc(-8*var(--w)) 0, calc(-9*var(--w)) 0 #000
            }

            100% {
                text-shadow:
                    calc(0*var(--w)) 0, calc(-1*var(--w)) 0, calc(-2*var(--w)) 0, calc(-3*var(--w)) 0, calc(-4*var(--w)) 0,
                    calc(-5*var(--w)) 0, calc(-6*var(--w)) 0, calc(-7*var(--w)) 0, calc(-8*var(--w)) 0, calc(-9*var(--w)) 0
            }
        }
    </style>

    <div class="p-3 d-flex justify-content-center">
        <div class="p-4 w-100 border border-secondary-subtle shadow-lg">
            @csrf
            <label><b>Write here</b></label>
            <textarea rows="3" placeholder="write here something" id="prompt" class="form-control"></textarea>
            <button onclick="generate()" id="generate-btn" class="btn btn-primary mt-3 justify-end">Generate</button>
        </div>
    </div>
    <div class="p-3 d-flex justify-content-center">
        <div class="w-100 position-relative">
            <textarea rows="20" placeholder="Generate Summary" id="summary"
                class="form-control shadow-lg h-100"></textarea>
            <div class="loader position-absolute top-50 start-50 translate-middle" style="display: none"></div>
        </div>
    </div>
    {{-- <div class="p-3 d-flex justify-content-center">
        <textarea rows="20" placeholder="Generate Summary" id="summary" class="form-control shadow-lg h-100">
        </textarea>
        <div class="loader" style="display: none"></div>
    </div> --}}
@endsection

@push('scripts')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function generate() {
            $('#generate-btn').prop('disabled', true);
            $('.loader').css('display', 'block');
            prompt = $("#prompt").val();
            $.ajax({
                url: '/generate-summary',
                type: 'POST',
                data: {
                    title: prompt
                },
                dataType: 'json',

                success: function(response) {
                    $('#generate-btn').prop('disabled', false);
                    $('.loader').css('display', 'none');
                    console.log(response)
                    if (response != '') {
                        $('#summary').val(response.summary);
                    } else {
                        console.log(response)
                    }
                }
            });

        }
    </script>
@endpush
