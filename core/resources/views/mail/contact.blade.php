@if ($subsc)
<h4>Hello Subscriber, </h4>
@endif


<p>{!! nl2br(replaceBaseUrl(convertUtf8($text))) !!}</p>

@if ($subsc)
<p class="mb-0">Best Regards,</p>
<p>{{convertUtf8($bs->website_title)}}</p>
@endif

