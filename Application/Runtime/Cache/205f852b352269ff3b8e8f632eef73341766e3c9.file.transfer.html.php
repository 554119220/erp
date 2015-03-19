<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-03-17 15:00:25
         compiled from ".\Application\Home\View\Hrm\transfer.html" */ ?>
<?php /*%%SmartyHeaderCode:275955507d10957bcf8-57996850%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '205f852b352269ff3b8e8f632eef73341766e3c9' => 
    array (
      0 => '.\\Application\\Home\\View\\Hrm\\transfer.html',
      1 => 1423620190,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '275955507d10957bcf8-57996850',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'header' => 0,
    'nav' => 0,
    'url' => 0,
    'footer' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5507d109a037a3_83568632',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5507d109a037a3_83568632')) {function content_5507d109a037a3_83568632($_smarty_tpl) {?><?php echo $_smarty_tpl->tpl_vars['header']->value;?>

<?php echo $_smarty_tpl->tpl_vars['nav']->value;?>

<div>
  <form action="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
/addPositionLevel" method="POST">
    <table class="form">
     <tr>
       <th>级别名称：</th>
       <td>
         <input type="text" name="level_name" value="" />
       </td>
     </tr>
     <tr>
       <td>
         <input type="submit" value="添加" />
       </td>
     </tr>
    </table>
  </form>
</div>
<?php echo $_smarty_tpl->tpl_vars['footer']->value;?>

<?php }} ?>
