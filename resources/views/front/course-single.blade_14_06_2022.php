@extends('front.layouts.master')

@section('head-script-style')    
@endsection

@section('title')
    Case studies single
@endsection

@section('content')
<section class="how_it_work_section" style="padding: 300px 0 60px 0;">
    <div class="container position-relative">
        <article>
            <div class="article_left">
                <img src="{{asset($course->image)}}" alt="">
                
            </div>
            <div class="article_right">
                <span class="badge mb-3">{{$course->category_name}}</span>
                <h1 class="text-uppercase darkblue proxima_exbold">{{$course->name}}</h1>

                <h5><em>Case study by <a href="{{route('front.experts.single', ['expertId' => $course->teacherDetail->id])}}"><strong>{{$course->teacherDetail->name}}</strong></a></em></h5>

                <div class="banner_content my-3">
                    <h1 class="text-uppercase proxima_bold" style="font-size: 25px;"><strong class="proxima_black" style="font-size: 25px;">DURATION</strong> {{$course->duration}} minutes</h1>
                    <h1 class="text-uppercase proxima_bold" style="font-size: 25px;"><strong class="proxima_black" style="font-size: 25px;">PRICE</strong> ${{$course->price}}</h1>
                </div>
                {!!$course->description!!}
                
                <div class="purchase_holder mt-4">
                    @if($coursePurchase == true)
                    <a href="{{route('user.caseStudy.index')}}" class="btn btn-success btn-lg">Already purchased <i class="fas fa-chevron-right"></i></a>
                    @else
                    <button class="btn btn-primary btn-lg" onclick="bookCaseStudyModal('{{$course->price}}')">Purchase now &amp; Unlock video lesson</button>
                    @endif
                </div>
            </div>
        </article>

        <div class="how_ite_works_plane">
            <img class="img-fluid" src="{{asset('front/images/how_it_work_plane.png')}}">
        </div>
    </div>
</section>


<!-- People also like  -->
<section class="more_articles">
    <div class="container">
        <div class="section_heading experty_insights_heading text-center">
            <h2 class="proxima_black text-uppercase darkblue">Articles you may like</h2>
        </div>
        <div class="mentors_slider owl-carousel owl-theme">
            @forelse ($randomCourses as $item)
            <div class="mentor_course">
                <div class="experty_insights_item">
                    <div class="experty_insights_img">
                        <img src="{{asset($item->image)}}">
                    </div>
                    <div class="experty_insights_content">
                        <span class="experty_insights_date">{{date('d M, Y', strtotime($item->created_at))}}</span>
                        <h3 class="proxima_bold darkblue">{{$item->title}}</h3>
                        <p class="darkgray">{{words($course->description, 20)}}</p>
                        <a href="{{route('front.articles.single', ['articleId' => $item->id])}}">Read More</a>
                    </div>
                </div>
            </div>
            @empty
            <h4 class="proxima_black text-uppercase darkblue text-center">oops! No Data</h4>
            @endforelse
        </div>
    </div>
</section>
<!-- People also like  -->

@include('front.modal.course-purchase')

@endsection

@section('script')
    
@endsection