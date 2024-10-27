<ul class="steps">
    @for ($i = 0; $i < $currentStep; $i++)
        <li class="step step-primary"></li>
    @endfor
    @for ($i = 0; $i < $stepsLeft; $i++)
        <li class="step"></li>
    @endfor
</ul>
