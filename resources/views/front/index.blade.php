@extends('layouts.front')
@section('title', $category['name'] ?? '首页')
@section('description', '随享中国社区是由随享中国社区团队开发、维护的开源项目，旨在帮助各位喜欢网站建设的朋友提供技术指导、踩坑记录。')

@section('link')
    @parent
    <link href="/index.css" rel="stylesheet" />
@endsection

@section('header')
    @parent
@endsection

@section('content_body')
            <div id="M14_B_CommunityIndex_SubNavUnderTG">
                <div class="mt15">
                    <a href="http://team.tiayo.com" target="_blank"><img src="{{ asset('/images/ggw.jpg') }}" /></a>
                </div>
            </div>
            <div class="com_conlist clearfix">
                <ul id="dataListUl">
                    @foreach($article_list as $article)
                    <li class=' __r_c_'>
                        <dl class='com_movies clearfix __r_c_'>
                            <dt>
                                <a href='{{$article['links']}}'  target='_blank'></a>
                            </dt>
                            <dd style=''>
                                <div class='com_ulr'>
                                    <img width='64' height='64' class='img' src='{{ $article->profile['avatar'] }}'>
                                    <h3>
                                        <a href='/{{config('site.article_path').$article['links']}}' target='_blank'>{{$article['title']}}</a>
                                    </h3>
                                    <p class='mt12 px14'>作者：{{ $article->profile['real_name'] }}&emsp;{{$article['updated_at']}}&emsp;阅读：{{ $article['click'] }}</p>
                                    <p class='pcont'>
                                        <i></i>
                                        {{$article['abstract']}}
                                        <a href='/{{config('site.article_path').$article['links']}}' target='_blank'>查看全文</a>
                                    </p><div class='clearfix com_usercom'><div class='ele_replay'><div class='textarea'>
                                                <textarea class='c_a5' onclick="window.open('/{{config('site.article_path').$article['links']}}#pinglun','','');">发表评论</textarea>
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
                @if (!isset($type) || $type != 'search')
                    <div class="news_addmore __r_c_">
                        <div id="counter" style="display:none">0</div>
                        <a href="javascript:volid(0);" id="more_article"><i></i>加载更多</a>
                    </div>
                @elseif ($type == 'search')
                    @if (empty($article_list))
                        <div class="search_page">
                            <ul>
                                <i>搜索结果为空！</i>
                            </ul>
                        </div>
                    @else
                    <div class="search_page">
                        <ul>
                            {{ $article_list->links() }}
                        </ul>
                    </div>
                    @endif
                @endif
            </div>
@endsection

@section('footer')
    @parent
@endsection

@section('script')
    @parent
    @include('front.more_article')
    @include('front.login_status')
    <script>
        $(document).ready(function () {
            $('#search_form').submit(function () {
                var key = $('#search_form_key').val();
                window.location.href = '/search/article/'+ key ;
                return false;
            })
        });
    </script>
@endsection