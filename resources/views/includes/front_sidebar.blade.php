<div class="col-md-4">

    <!-- Blog Search Well -->
    <div class="well">
        <h4>Search</h4>
        <div class="input-group">
            <input type="text" class="form-control">
            <span class="input-group-btn">
                <button class="btn btn-default" type="button">
                    <span class="glyphicon glyphicon-search"></span>
            </button>
            </span>
        </div>
        <!-- /.input-group -->
    </div>

    <!-- Blog Categories Well -->
    <div class="well">
        <h4>Patient Categories</h4>
        <div class="row">
            <div class="col-lg-6">
                <ul class="list-unstyled">

                    @if($patientcategories)
        
                        @foreach($patientcategories as $patientcategory)

                    <li><a href="#">{{$patientcategory->name}}</a>

                        @endforeach

                    @endif
                </ul>
            </div>
        </div>
        <!-- /.row -->
    </div>

    <!-- Side Widget Well -->
    <div class="well">
        <h4>Valami widget</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
    </div>

</div>