@extends('layout.default')
@section("myblock")

<header class="text-center">
    <div class="container">
        <h1 class="text-primary">Frequently Asked Questions</h1>
        <p class="lead">Common questions and answers about our services.</p>
    </div>
</header>

<!-- FAQ Section -->
<section class="faq-container">
    <div class="container">
        <div class="accordion" id="faqAccordion">

            <!-- Question 1 -->
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h5 class="mb-0">
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Q: What services do you offer?
                        </button>
                    </h5>
                </div>
                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#faqAccordion">
                    <div class="card-body">
                        A: Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit id natus quia dolore eius totam placeat delectus iste sint iusto.
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h5 class="mb-0">
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Q: Lorem ipsum dolor sit amet consectetur?
                        </button>
                    </h5>
                </div>
                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#faqAccordion">
                    <div class="card-body">
                        A: Lorem ipsum dolor sit amet consectetur, adipisicing elit. Alias blanditiis officia fuga voluptas, quam ipsum.
                    </div>
                </div>
            </div>

            <!-- Add more questions as needed -->

        </div>
    </div>
</section>

@stop