<!DOCTYPE html>
<html lang="en">
    <head>
        @include('partials.header')

        @yield('stylesheets')

        @yield('scripts')
    </head>

    <body>
        <section id="container" class="">
                @include('partials.nav')

                @include('partials.sidebar')
            <section id="main-content" class="">
                <div class="wrapper">

                    @yield('content')
                    
                </div>
            </section>
        </section>

        @include('partials.scripts')
        
        @yield('scripts')
    </body> 
 </html>