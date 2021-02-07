<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">




            <div class="content">
                <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
                    @csrf

                    Name :
                    <input type="text" name="name" placeholder="pro.name">
                    qty :
                    <input type="text" name="qty" placeholder="pro.qty">
                    IMAGE :
                    <input type="file" name="imagee" >
                    <button type="submit">ADD NEW PRODUCT</button>
                </form>
                <div class="title m-b-md">
                    ALL PRODUCT
                    <br>
                    [Soft-Delete/Media Library]
                </div>

                <br>
                <table cellpadding="10px" border="1px solid black">
                    <thead>
                    <tr>
                        <th>name</th>
                        <th>Qty</th>
                        <th>created_at</th>
                        <th>updated_at</th>
                        <th>Soft Delete</th>
                        <th>Image</th>
                        <th>add new image</th>

                    </tr>
                    </thead>


                    <tbody>

                    @foreach($product as $pro)

                        <tr>
                            <td>{{$pro->name}}</td>
                            <td>{{$pro->qty}}</td>
                            <td>{{($pro->created_at)?$pro->created_at:'null'}}</td>
                            <td>{{($pro->updated_at)?$pro->updated_at:'null'}}</td>
                            <td>
                                <form action="{{ url('product' , $pro->id ) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button class="btn btn-danger">Delete <i class="far fa-trash-alt"></i></button>
                                </form>
                            </td>
                            <td style="width: 100px">
                               @if (count($pro->getMedia('glasses'))>0)

                                   @foreach($pro->getMedia('glasses') as $image)

                                        <img  src="{{$image->getUrl()}}" width="100%">
                                       <hr>
                                   @endforeach
                               @endif
                            </td>
                            <td>

                                <form action="{{ url('product/newImage') }}" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="id" value="{{$pro->id}}">
                                   <input type="file" name="imagee">
                                    <button class="btn btn-danger">New Image <i class="far fa-trash-alt"></i></button>
                                </form>

                            </td>


                        </tr>
                    @endforeach
                    </tbody>


                </table>
            <a href="{{url('product/aaa')}}"> View Trashed Products</a>
            </div>
        </div>
    </body>
</html>
