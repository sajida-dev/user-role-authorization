<?php
$role = "";
if (isset($_POST['submit'])):
    if (!empty($_POST['role'])):
        $role = $_POST['role'];
    endif;
endif;
function hasPermission($role)
{
    $roles = ["Admin", "Editor"];
    if (in_array($role, $roles)):
        return true;
    endif;
    return false;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Problem 1: User Role Authorization System</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
</head>

<body>
    <div class="flex items-center justify-center min-h-screen dark:bg-gray-600">
        <div class="w-full max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
            <?php
            if (isset($_POST['submit']) && $role != ''):
                if (hasPermission($role)):
                    include "success-alert.php";
                else:
                    include "error-alert.php";
                endif;
            endif;
            ?>
            <form class="space-y-6" action="" method="post">
                <h5 class="text-xl font-medium text-gray-900 dark:text-white">Select your role</h5>
                <div>
                    <label for="role" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Enter your role</label>
                    <input type="text" name="role" id="role" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" />
                    <p class="text-red-500 text-sm font-medium">
                        <?php
                        if (isset($_POST['submit'])):
                            if ($role == ''):
                                echo "Role field is required";
                            endif;
                        endif;
                        ?>
                    </p>
                </div>

                <button type="submit" name="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>

            </form>
        </div>

    </div>
</body>

</html>