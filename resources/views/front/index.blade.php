@extends('layouts.front')
@section('title', $category['name'] ?? '首页')
@section('description', '随享校园社区是基于祥景CMS架构的一套分享php学习之路的网站,大量常用的代码和常遇到的问题不断更新中.')

@section('link')
    @parent
    <link href="/index.css" rel="stylesheet" />
@endsection

@section('header')
    @parent
@endsection

@section('content_body')
            <div id="M14_B_CommunityIndex_SubNavUnderTG"><div class="mt15">
                    <img src="/images/ggw.jpg" />
                </div>
            </div>            <div class="com_conlist clearfix">

                <ul id="dataListUl">
                    @foreach($article_list as $article)
                    <li class=' __r_c_'>
                        <dl class='com_movies clearfix __r_c_'>
                            <dt>
                                <a href='{{$article['links']}}'  target='_blank'></a>
                            </dt>
                            <dd style=''>
                                <div class='com_ulr'>
                                    <img width='64' height='64' class='img' src='{{app('\App\Article')->find($article['article_id'])->profile->avatar}}'>
                                    <h3>
                                        <a href='{{config('site.article_path').$article['links']}}' target='_blank'>{{$article['title']}}</a>
                                    </h3>
                                    <p class='mt12 px14'>作者：{{$article['real_name']}}&emsp;{{$article['updated_at']}}&emsp;阅读：{{$article['click']}}</p>
                                    <p class='pcont'>
                                        <i></i>
                                        {{$article['abstract']}}
                                        <a href='{{config('site.article_path').$article['links']}}' target='_blank'>查看全文</a>
                                    </p><div class='clearfix com_usercom'><div class='ele_replay'><div class='textarea'>
                                                <textarea class='c_a5' onclick="window.open('{{config('site.article_path').$article['links']}}#pinglun','','');">发表评论</textarea>
                                            </div>
                                        </div>
                                        <i class='comnumi'></i>
                                    </div>
                                </div>
                            </dd>
                        </dl>
                    </li>
                    @endforeach
                </ul>
                <div class="news_addmore __r_c_">
                    <div id="counter" style="display:none">0</div>
                    <a href="javascript:volid(0);" id="more_article"><i></i>加载更多</a>
                </div>
            </div>
@endsection

@section('footer')
    @parent
@endsection

@section('script')
    @parent
    @include('front.more_article')
    <script>
        $(document).ready(function () {
            axios.get('/ajax/login_status')
            .then(function (response) {
                console.log(response);
                $('#login_status').css('display', 'block');
                $('#no_login_status').css('display', 'none');
            })
            .catch(function (error) {
                console.log('jinru');
                $('#login_status').css('display', 'none');
                $('#no_login_status').css('display', 'block');
            });
        })
    </script>
@endsection