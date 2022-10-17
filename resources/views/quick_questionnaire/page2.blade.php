<?= view('layout.header') ?>



    <section class="w3-padding">

        <h1 class="w3-text-blue">Plastic Waste Quick Calculator</h1>

        <table class="w3-table w3-stripped w3-bordered w3-margin-bottom">
            <tr class="w3-blue">
                <th>Here are the different types of plastic products that are commonly found at Home:</th>
                <th></th> <!-- From table 'questionnaire_questions'. -->
                <th></th> <!-- Question's multiple choices and corresponding icons are displayed here. From table 'questionnaire_choices'. -->
                <th></th> <!-- From table 'questionnaire_questions'. -->
                <th></th> <!-- From table 'questionnaire_questions'. -->
                <th></th> <!-- 'Icon' edit button. From table 'questionnaire_choices'. -->
                <th></th> <!-- 'Edit' button. -->
                <th></th> <!-- 'Delete' button. -->
            </tr>
            <tr>
                <td>
                    KITCHEN:
                    <ul>
                        <li>- Dish soap bottle</li>
                        <li>- Hand soap bottle</li>
                        <li>- Sponge stick</li>
                        <li>- Cutting board</li>
                    </ul>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>
                    RESTROOM / BATHROOM:
                    <ul>
                        <li>- Shampoo bottle</li>
                        <li>- Body soap bottle</li>
                        <li>- Conditioner bottle</li>
                        <li>- Hand soap bottle</li>
                        <li>- Toothbrush</li>
                        <li>- Toothpaste tube</li>
                    </ul>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>
                    LAUNDRY:
                    <ul>
                        <li>- Detergent bottle</li>
                        <li>- Laundry softener bottle</li>
                    </ul>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td><a href="/quick-calculator/page1">Back</a></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </table>

        <!--<a href="/console/questionnaire/add" class="w3-button w3-green">New Questionnaire Question & Choices</a>-->

    </section>

<?= view('layout.footer') ?>