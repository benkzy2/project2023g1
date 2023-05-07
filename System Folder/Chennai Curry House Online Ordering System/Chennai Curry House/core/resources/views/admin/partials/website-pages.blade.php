<li class="nav-item
@if(request()->path() == 'admin/features') active
@elseif(request()->path() == 'admin/introsection') active
@elseif(request()->path() == 'admin/special/section') active
@elseif(request()->is('admin/menu/special/update')) active
@elseif(request()->path() == 'admin/menu/section') active
@elseif(request()->is('admin/menu/section/update')) active
@elseif(request()->path() == 'admin/herosection/imgtext') active
@elseif(request()->path() == 'admin/herosection/video') active
@elseif(request()->path() == 'admin/herosection/sliders') active
@elseif(request()->is('admin/herosection/slider/*/edit')) active
@elseif(request()->path() == 'admin/members') active
@elseif(request()->is('admin/member/*/edit')) active
@elseif(request()->is('admin/feature/*/edit')) active
@elseif(request()->path() == 'admin/testimonials') active
@elseif(request()->is('admin/testimonial/*/edit')) active
@elseif(request()->path() == 'admin/blogsection') active
@elseif(request()->path() == 'admin/member/create') active
@elseif(request()->path() == 'admin/sections') active

@elseif(request()->path() == 'admin/bcategorys') active
@elseif(request()->path() == 'admin/blogs') active
@elseif(request()->is('admin/blog/*/edit')) active

@elseif(request()->path() == 'admin/page/create') active
@elseif(request()->path() == 'admin/pages') active
@elseif(request()->is('admin/page/*/edit')) active

@elseif(request()->path() == 'admin/footers') active
@elseif(request()->path() == 'admin/ulinks') active
@elseif(request()->path() == 'admin/bottom/links') active

@elseif(request()->path() == 'admin/jcategorys') active
@elseif(request()->path() == 'admin/job/create') active
@elseif(request()->is('admin/jcategory/*/edit')) active
@elseif(request()->path() == 'admin/jobs') active
@elseif(request()->is('admin/job/*/edit')) active

@elseif(request()->path() == 'admin/gallery') active
@elseif(request()->path() == 'admin/gallery/create') active
@elseif(request()->is('admin/gallery/*/edit')) active

@elseif(request()->path() == 'admin/faqs') active


@elseif(request()->path() == 'admin/contact') active
@endif">
    <a data-toggle="collapse" href="#webContents">
        <i class="la flaticon-imac"></i>
        <p>Website Pages</p>
        <span class="caret"></span>
    </a>
    <div class="collapse
    @if(request()->path() == 'admin/features') show
    @elseif(request()->path() == 'admin/introsection') show
    @elseif(request()->path() == 'admin/special/section') show
    @elseif(request()->is('admin/menu/special/update')) show
    @elseif(request()->path() == 'admin/menu/section') show
    @elseif(request()->is('admin/menu/section/update')) show
    @elseif(request()->path() == 'admin/herosection/imgtext') show
    @elseif(request()->path() == 'admin/herosection/video') show
    @elseif(request()->path() == 'admin/herosection/sliders') show
    @elseif(request()->is('admin/herosection/slider/*/edit')) show
    @elseif(request()->path() == 'admin/members') show
    @elseif(request()->is('admin/member/*/edit')) show
    @elseif(request()->is('admin/feature/*/edit')) show
    @elseif(request()->path() == 'admin/testimonials') show
    @elseif(request()->is('admin/testimonial/*/edit')) show
    @elseif(request()->path() == 'admin/blogsection') show
    @elseif(request()->path() == 'admin/member/create') show
    @elseif(request()->path() == 'admin/sections') show

    @elseif(request()->path() == 'admin/bcategorys') show
    @elseif(request()->path() == 'admin/blogs') show
    @elseif(request()->is('admin/blog/*/edit')) show

    @elseif(request()->path() == 'admin/page/create') show
    @elseif(request()->path() == 'admin/pages') show
    @elseif(request()->is('admin/page/*/edit')) show

    @elseif(request()->path() == 'admin/footers') show
    @elseif(request()->path() == 'admin/ulinks') show
    @elseif(request()->path() == 'admin/bottom/links') show

    @elseif(request()->path() == 'admin/jcategorys') show
    @elseif(request()->path() == 'admin/job/create') show
    @elseif(request()->is('admin/jcategory/*/edit')) show
    @elseif(request()->path() == 'admin/jobs') show
    @elseif(request()->is('admin/job/*/edit')) show

    @elseif(request()->path() == 'admin/gallery') show
    @elseif(request()->path() == 'admin/gallery/create') show
    @elseif(request()->is('admin/gallery/*/edit')) show

    @elseif(request()->path() == 'admin/faqs') show


    @elseif(request()->path() == 'admin/contact') show
    @endif" id="webContents">
        <ul class="nav nav-collapse">

            {{-- Home Page Sections --}}
            <li class="
            @if(request()->path() == 'admin/features') selected
            @elseif(request()->path() == 'admin/introsection') selected
            @elseif(request()->path() == 'admin/special/section') selected
            @elseif(request()->is('admin/menu/special/update')) selected
            @elseif(request()->path() == 'admin/menu/section') selected
            @elseif(request()->is('admin/menu/section/update')) selected
            @elseif(request()->path() == 'admin/herosection/imgtext') selected
            @elseif(request()->path() == 'admin/herosection/video') selected
            @elseif(request()->path() == 'admin/herosection/sliders') selected
            @elseif(request()->is('admin/herosection/slider/*/edit')) selected
            @elseif(request()->path() == 'admin/members') selected
            @elseif(request()->is('admin/member/*/edit')) selected
            @elseif(request()->is('admin/feature/*/edit')) selected
            @elseif(request()->path() == 'admin/testimonials') selected
            @elseif(request()->is('admin/testimonial/*/edit')) selected
            @elseif(request()->path() == 'admin/blogsection') selected
            @elseif(request()->path() == 'admin/member/create') selected
            @elseif(request()->path() == 'admin/sections') selected
            @endif">
                <a data-toggle="collapse" href="#home">
                    <span class="sub-item">Home Page Sections</span>
                    <span class="caret"></span>
                </a>
                <div class="collapse
                @if(request()->path() == 'admin/features') show
                @elseif(request()->path() == 'admin/introsection') show
                @elseif(request()->path() == 'admin/special/section') show
                @elseif(request()->is('admin/menu/special/update')) show
                @elseif(request()->path() == 'admin/menu/section') show
                @elseif(request()->is('admin/menu/section/update')) show
                @elseif(request()->path() == 'admin/herosection/imgtext') show
                @elseif(request()->path() == 'admin/herosection/video') show
                @elseif(request()->path() == 'admin/herosection/sliders') show
                @elseif(request()->is('admin/herosection/slider/*/edit')) show
                @elseif(request()->path() == 'admin/members') show
                @elseif(request()->is('admin/member/*/edit')) show
                @elseif(request()->is('admin/feature/*/edit')) show
                @elseif(request()->path() == 'admin/testimonials') show
                @elseif(request()->is('admin/testimonial/*/edit')) show
                @elseif(request()->path() == 'admin/blogsection') show
                @elseif(request()->path() == 'admin/member/create') show
                @elseif(request()->path() == 'admin/sections') show
                @endif" id="home">
                    <ul class="nav nav-collapse subnav">
                        <li class="
                        @if(request()->path() == 'admin/herosection/imgtext') selected
                        @elseif(request()->path() == 'admin/herosection/video') selected
                        @elseif(request()->path() == 'admin/herosection/sliders') selected
                        @elseif(request()->is('admin/herosection/slider/*/edit')) selected
                        @endif">
                        <a data-toggle="collapse" href="#herosection">
                            <span class="sub-item">Hero Section</span>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse
                        @if(request()->path() == 'admin/herosection/imgtext') show
                        @elseif(request()->path() == 'admin/herosection/video') show
                        @elseif(request()->path() == 'admin/herosection/sliders') show
                        @elseif(request()->is('admin/herosection/slider/*/edit')) show
                        @endif" id="herosection">
                        <ul class="nav nav-collapse subnav">
                            <li class="@if(request()->path() == 'admin/herosection/imgtext') active @endif">
                                <a href="{{route('admin.herosection.imgtext') . '?language=' . $default->code}}">
                                    <span class="sub-item">Image & Text</span>
                                </a>
                            </li>
                            <li class="
                            @if(request()->path() == 'admin/herosection/sliders') active
                            @elseif(request()->is('admin/herosection/slider/*/edit')) active
                            @endif">
                            <a href="{{route('admin.slider.index') . '?language=' . $default->code}}">
                                <span class="sub-item">Sliders</span>
                            </a>
                        </li>
                        <li class="@if(request()->path() == 'admin/herosection/video') active @endif">
                            <a href="{{route('admin.herosection.video') . '?language=' . $default->code}}">
                                <span class="sub-item">Video Link</span>
                            </a>
                        </li>
                    </ul>
                    </div>
                    </li>
                    <li class="
                    @if(request()->path() == 'admin/features') active
                    @elseif(request()->is('admin/feature/*/edit')) active
                    @endif">
                    <a href="{{route('admin.feature.index') . '?language=' . $default->code}}">
                        <span class="sub-item">Features</span>
                    </a>
                    </li>

                    <li class="@if(request()->path() == 'admin/introsection') active @endif">
                        <a href="{{route('admin.introsection.index') . '?language=' . $default->code}}">
                            <span class="sub-item">Intro Section</span>
                        </a>
                    </li>


                    <li class="
                    @if(request()->path() == 'admin/menu/section') active
                    @elseif(request()->is('admin/menu/section/update')) active
                    @endif">
                      <a href="{{route('admin.menusection.index') . '?language=' . $default->code}}">
                        <span class="sub-item">Menu Section</span>
                      </a>
                    </li>

                    <li class="
                    @if(request()->path() == 'admin/special/section') active
                    @elseif(request()->is('admin/menu/special/update')) active
                    @endif">
                      <a href="{{route('admin.specialsection.index') . '?language=' . $default->code}}">
                        <span class="sub-item">Special Section</span>
                      </a>
                    </li>

                    <li class="
                    @if(request()->path() == 'admin/testimonials') active
                    @elseif(request()->is('admin/testimonial/*/edit')) active
                    @endif">
                    <a href="{{route('admin.testimonial.index') . '?language=' . $default->code}}">
                        <span class="sub-item">Testimonials</span>
                    </a>
                    </li>
                    <li class="
                    @if(request()->path() == 'admin/members') active
                    @elseif(request()->is('admin/member/*/edit')) active
                    @elseif(request()->path() == 'admin/member/create') active
                    @endif">
                    <a href="{{route('admin.member.index') . '?language=' . $default->code}}">
                        <span class="sub-item">Team Section</span>
                    </a>
                    </li>


                    <li class="@if(request()->path() == 'admin/blogsection') active @endif">
                        <a href="{{route('admin.blogsection.index') . '?language=' . $default->code}}">
                            <span class="sub-item">Blog Section</span>
                        </a>
                    </li>


                    <li class="
                    @if(request()->path() == 'admin/sections') active
                    @endif">
                    <a href="{{route('admin.sections.index') . '?language=' . $default->code}}">
                        <span class="sub-item">Section Customization</span>
                    </a>
                    </li>

                    </ul>
                </div>
            </li>


            {{-- Footer --}}
            <li class="
            @if(request()->path() == 'admin/footers') selected
            @elseif(request()->path() == 'admin/ulinks') selected
            @elseif(request()->path() == 'admin/bottom/links') selected
            @endif">
                <a data-toggle="collapse" href="#footer">
                    <span class="sub-item">Footer</span>
                    <span class="caret"></span>
                </a>
                <div class="collapse
                @if(request()->path() == 'admin/footers') show
                @elseif(request()->path() == 'admin/ulinks') show
                @elseif(request()->path() == 'admin/bottom/links') show
                @endif" id="footer">
                    <ul class="nav nav-collapse subnav">
                        <li class="@if(request()->path() == 'admin/footers') active @endif">
                            <a href="{{route('admin.footer.index') . '?language=' . $default->code}}">
                                <span class="sub-item">Image & Text</span>
                            </a>
                        </li>
                        <li class="@if(request()->path() == 'admin/ulinks') active @endif">
                            <a href="{{route('admin.ulink.index') . '?language=' . $default->code}}">
                                <span class="sub-item">Useful Links</span>
                            </a>
                        </li>
                        <li class="@if(request()->path() == 'admin/bottom/links') active @endif">
                            <a href="{{route('admin.blink.index') . '?language=' . $default->code}}">
                              <span class="sub-item">Bottom Links</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>


            {{-- Gallery --}}
            <li class="@if(request()->path() == 'admin/gallery') selected
                @elseif(request()->path() == 'admin/gallery/create') selected
                @elseif(request()->is('admin/gallery/*/edit')) selected
                @endif"
                >
                <a href="{{route('admin.gallery.index') . '?language=' . $default->code}}">
                    <span class="sub-item">Gallery</span>
                </a>
            </li>

            {{-- FAQ --}}
            <li class="@if(request()->path() == 'admin/faqs') active @endif">
                <a href="{{route('admin.faq.index') . '?language=' . $default->code}}">
                    <span class="sub-item">FAQs</span>
                </a>
            </li>

            {{-- Blogs Management --}}
            <li class="
            @if(request()->path() == 'admin/bcategorys') selected
            @elseif(request()->path() == 'admin/blogs') selected
            @elseif(request()->is('admin/blog/*/edit')) selected
            @endif">
                <a data-toggle="collapse" href="#blogs">
                    <span class="sub-item">Blogs</span>
                    <span class="caret"></span>
                </a>
                <div class="collapse
                @if(request()->path() == 'admin/bcategorys') show
                @elseif(request()->path() == 'admin/blogs') show
                @elseif(request()->is('admin/blog/*/edit')) show
                @endif" id="blogs">
                    <ul class="nav nav-collapse subnav">
                        <li class="@if(request()->path() == 'admin/bcategorys') active @endif">
                            <a href="{{route('admin.bcategory.index') . '?language=' . $default->code}}">
                                <span class="sub-item">Category</span>
                            </a>
                        </li>
                        <li class="
                            @if(request()->path() == 'admin/blogs') active
                            @elseif(request()->is('admin/blog/*/edit')) active
                            @endif">
                            <a href="{{route('admin.blog.index') . '?language=' . $default->code}}">
                                <span class="sub-item">Blogs</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>


            {{-- Career Page --}}
            <li class="
            @if(request()->path() == 'admin/jcategorys') selected
            @elseif(request()->path() == 'admin/job/create') selected
            @elseif(request()->is('admin/jcategory/*/edit')) selected
            @elseif(request()->path() == 'admin/jobs') selected
            @elseif(request()->is('admin/job/*/edit')) selected
            @endif">
                <a data-toggle="collapse" href="#career">
                    <span class="sub-item">Career</span>
                    <span class="caret"></span>
                </a>
                <div class="collapse
                @if(request()->path() == 'admin/jcategorys') show
                @elseif(request()->path() == 'admin/job/create') show
                @elseif(request()->is('admin/jcategory/*/edit')) show
                @elseif(request()->path() == 'admin/jobs') show
                @elseif(request()->is('admin/job/*/edit')) show
                @endif" id="career">
                    <ul class="nav nav-collapse subnav">
                        <li class="
                            @if(request()->path() == 'admin/jcategorys') active
                            @elseif(request()->is('admin/jcategory/*/edit')) active
                            @endif">
                            <a href="{{route('admin.jcategory.index') . '?language=' . $default->code}}">
                                <span class="sub-item">Category</span>
                            </a>
                        </li>
                        <li class="
                        @if(request()->is('admin/job/create')) active
                        @endif">
                            <a href="{{route('admin.job.create')}}">
                                <span class="sub-item">Post Job</span>
                            </a>
                        </li>
                        <li class="
                        @if(request()->path() == 'admin/jobs') active
                        @elseif(request()->is('admin/job/*/edit')) active
                        @endif">
                            <a href="{{route('admin.job.index') . '?language=' . $default->code}}">
                                <span class="sub-item">Job Management</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>


            {{-- Contact Page --}}
            <li class="
            @if(request()->path() == 'admin/contact') selected @endif">
                <a href="{{route('admin.contact.index') . '?language=' . $default->code}}">
                    <span class="sub-item">Contact Page</span>
                </a>
            </li>


            {{-- Custom Pages --}}
            <li class="@if(request()->path() == 'admin/page/create') selected
            @elseif(request()->path() == 'admin/pages') selected
            @elseif(request()->is('admin/page/*/edit')) selected
            @endif">
              <a data-toggle="collapse" href="#pages">
                <span class="sub-item">Custom Pages</span>
                <span class="caret"></span>
              </a>
              <div class="collapse
              @if(request()->path() == 'admin/page/create') show
              @elseif(request()->path() == 'admin/pages') show
              @elseif(request()->is('admin/page/*/edit')) show
              @endif" id="pages">
                <ul class="nav nav-collapse subnav">
                  <li class="@if(request()->path() == 'admin/page/create') selected @endif">
                    <a href="{{route('admin.page.create')}}">
                      <span class="sub-item">Create Page</span>
                    </a>
                  </li>
                  <li class="
                  @if(request()->path() == 'admin/pages') selected
                  @elseif(request()->is('admin/page/*/edit')) selected
                  @endif">
                    <a href="{{route('admin.page.index') . '?language=' . $default->code}}">
                      <span class="sub-item">Pages</span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>

        </ul>
    </div>

</li>
