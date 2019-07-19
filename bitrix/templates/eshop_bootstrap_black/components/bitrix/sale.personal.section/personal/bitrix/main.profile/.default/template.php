<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
	die();

use Bitrix\Main\Localization\Loc;

?>

<div class="bx_profile">
	<?
	ShowError($arResult["strProfileError"]);

	if ($arResult['DATA_SAVED'] == 'Y')
	{
		ShowNote(Loc::getMessage('PROFILE_DATA_SAVED'));
	}

	?>
    <div class="personal-cabinet-block__content__page">
        <div class="personal-cabinet-block__content__page-item">
            <div class="personal-cabinet-block__title">Контактные данные</div>


            <form method="post" name="form1" action="<?=$APPLICATION->GetCurUri()?>" enctype="multipart/form-data" role="form">
                <?=$arResult["BX_SESSION_CHECK"]?>
                <input type="hidden" name="lang" value="<?=LANG?>" />
                <input type="hidden" name="ID" value="<?=$arResult["ID"]?>" />
                <input type="hidden" name="LOGIN" value="<?=$arResult["arUser"]["LOGIN"]?>" />
                <div class="main-profile-block-shown" id="user_div_reg">

                    <div class="personal-cabinet-block__form__input-wrapper">
                        <label class="full-width" name="name">
                            <input id="main-profile-name" name="NAME" class="personal-cabinet-block__form__input full-width" type="text" value="<?=$arResult["arUser"]["NAME"]?>" required   placeholder='<?=Loc::getMessage('NAME')?>'>
                        </label>
                    </div>
                    <div class="personal-cabinet-block__form__input-wrapper two_fields">
                        <label class="half_width "  name="mail">
                            <input class="personal-cabinet-block__form__input" type="email" name="EMAIL" id="main-profile-email" value="<?=$arResult["arUser"]["EMAIL"]?>" required pattern="\S+@[a-z]+.[a-z]+" placeholder='Email'>
                        </label>
                        <label class="half_width "  name="phone">
                            <input class="personal-cabinet-block__form__input " type="text" required   placeholder='Телефон не раб'>
                        </label>
                    </div>

                    <?
                    if ($arResult['CAN_EDIT_PASSWORD'])
                    {
                        ?>
                        <div class="form-group">
                            <p class="main-profile-form-password-annotation col-sm-9 col-sm-offset-3 small">
                                <?echo $arResult["GROUP_POLICY"]["PASSWORD_REQUIREMENTS"];?>
                            </p>
                        </div>

                        <div class="personal-cabinet-block__form__input-wrapper two_fields">

                            <label class="half_width "  name="mail">
                                <input class="personal-cabinet-block__form__input" type="password" name="NEW_PASSWORD" id="main-profile-password" value="" autocomplete="off" required  placeholder='<?=Loc::getMessage('NEW_PASSWORD_REQ')?>'>
                            </label>

                            <label class="half_width "  name="phone">
                                <input class="personal-cabinet-block__form__input " type="password" name="NEW_PASSWORD_CONFIRM" maxlength="50" value="" id="main-profile-password-confirm" autocomplete="off" required   placeholder='<?=Loc::getMessage('NEW_PASSWORD_CONFIRM')?>'>
                            </label>

                        </div>



                        <?
                    }
                    ?>
                </div>
                <input type="submit" name="save" class="personal-cabinet-block__form__submit" value="<?=(($arResult["ID"]>0) ? Loc::getMessage("MAIN_SAVE") : Loc::getMessage("MAIN_ADD"))?>">

            </form>

            <!--button class="personal-cabinet-block__form__submit" type="submit">изменить пароль</button-->
            <div class="cart-block__cart-order-reg-item__input-checkbox-wrapper">
                <input  class="cart-block__cart-order-reg-item__checbox"  type="checkbox" name="" id="cart-block__cart-order-reg-item-checkbox">
                <label for="cart-block__cart-order-reg-item-checkbox">
                    <p class="cart-block__cart-order-reg-item__checbox-desc">Хочу получать новостную рассылку</p>
                </label>
            </div>
        </div>
        <?
            $rsUser = CUser::GetByID($USER->GetID());
            $arUser = $rsUser->Fetch();
        ?>
        <div class="personal-cabinet-block__content__page-item">
            <div class="personal-cabinet-block__title">Адреса доставки</div>
            <div class="user_info">
                <div class="card_item">
                    <div class="user_name"><?=$arUser['NAME']?></div>
                    <p class="user_adress"><?=$arUser['PERSONAL_STREET']?></p>
                    <p class="user_phone"><?=$arUser['PERSONAL_PHONE']?></p>
                </div>
                <div class="remove-item"></div>
            </div>
        </div>

        <div class="personal-cabinet-block__content__page-item">
            <div class="personal-cabinet-block__title">Карты</div>
            <div class="user_info">
                <div class="card_item">
                    <div class="card-info">
                        <p class='user_name card_number'>5536 41** **** 6778</p>
                        <p class="card_date">06/20</p>
                    </div>
                </div>
                <div class="remove-item"></div>
            </div>
            <!-- <button class="personal-cabinet-block__form__submit" type="submit">Добавить карту</button> -->
        </div>
        
    </div>
	<div class="clearfix"></div>
</div>