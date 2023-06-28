<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
	die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */

$buttonId = $this->randString();
?>
<div class="bx-subscribe" id="sender-subscribe">
	<?
	$frame = $this->createFrame("sender-subscribe", false)->begin();
	?>
	<? if (isset($arResult['MESSAGE'])):
		CJSCore::Init(array("popup")); ?>
		<div id="sender-subscribe-response-cont" style="display: none;">
			<div class="bx_subscribe_response_container">
				<table>
					<tr>
						<td style="padding-right: 40px; padding-bottom: 0px;"><img
								src="<?= ($this->GetFolder() . '/images/' . ($arResult['MESSAGE']['TYPE'] == 'ERROR' ? 'icon-alert.png' : 'icon-ok.png')) ?>"
								alt=""></td>
						<td>
							<div style="font-size: 22px;">
								<?= GetMessage('subscr_form_response_' . $arResult['MESSAGE']['TYPE']) ?>
							</div>
							<div style="font-size: 16px;">
								<?= htmlspecialcharsbx($arResult['MESSAGE']['TEXT']) ?>
							</div>
						</td>
					</tr>
				</table>
			</div>
		</div>
		<script>
			BX.ready(function () {
				var oPopup = BX.PopupWindowManager.create('sender_subscribe_component', window.body, {
					autoHide: true,
					offsetTop: 1,
					offsetLeft: 0,
					lightShadow: true,
					closeIcon: true,
					closeByEsc: true,
					overlay: {
						backgroundColor: 'rgba(57,60,67,0.82)', opacity: '80'
					}
				});
				oPopup.setContent(BX('sender-subscribe-response-cont'));
				oPopup.show();
			});
		</script>
	<? endif; ?>

	<script>
		(function () {
			var btn = BX('bx_subscribe_btn_<?= $buttonId ?>');
			var form = BX('bx_subscribe_subform_<?= $buttonId ?>');

			if (!btn) {
				return;
			}

			function mailSender() {
				setTimeout(function () {
					if (!btn) {
						return;
					}

					var btn_span = btn.querySelector("span");
					var btn_subscribe_width = btn_span.style.width;
					BX.addClass(btn, "send");
					btn_span.outterHTML = "<span><i class='fa fa-check'></i> <?= GetMessage("subscr_form_button_sent") ?></span>";
					if (btn_subscribe_width) {
						btn.querySelector("span").style["min-width"] = btn_subscribe_width + "px";
					}
				}, 400);
			}

			BX.ready(function () {
				BX.bind(btn, 'click', function () {
					setTimeout(mailSender, 250);
					return false;
				});
			});

			BX.bind(form, 'submit', function () {
				btn.disabled = true;
				setTimeout(function () {
					btn.disabled = false;
				}, 2000);

				return true;
			});
		})();
	</script>

	<form id="bx_subscribe_subform_<?= $buttonId ?>" role="form" method="post" action="<?= $arResult["FORM_ACTION"] ?>">
		<?= bitrix_sessid_post() ?>
		<input type="hidden" name="sender_subscription" value="add">

		<div class="bx-input-group">
			<input class="bx-form-control" type="email" name="SENDER_SUBSCRIBE_EMAIL" value="<?= $arResult["EMAIL"] ?>"
				title="<?= GetMessage("subscr_form_email_title") ?>"
				placeholder="<?= htmlspecialcharsbx(GetMessage('subscr_form_email_title')) ?>">
		</div>

		<div style="<?= (($arParams['HIDE_MAILINGS'] ?? '') <> 'Y' ? '' : 'display: none;') ?>">
			<? if (count($arResult["RUBRICS"]) > 0): ?>
				<div class="bx-subscribe-desc">
					<?= GetMessage("subscr_form_title_desc") ?>
				</div>
			<? endif; ?>
			<? foreach ($arResult["RUBRICS"] as $itemID => $itemValue): ?>
				<div class="bx_subscribe_checkbox_container">
					<input type="checkbox" name="SENDER_SUBSCRIBE_RUB_ID[]"
						id="SENDER_SUBSCRIBE_RUB_ID_<?= $itemValue["ID"] ?>" value="<?= $itemValue["ID"] ?>"
						<? if ($itemValue["CHECKED"])
							echo " checked" ?>>
						<label
							for="SENDER_SUBSCRIBE_RUB_ID_<?= $itemValue["ID"] ?>"><?= htmlspecialcharsbx($itemValue["NAME"]) ?></label>
				</div>
			<? endforeach; ?>
		</div>

		<? if (($arParams['USER_CONSENT'] ?? '') == 'Y' && $arParams['AJAX_MODE'] <> 'Y'): ?>
			<div class="bx_subscribe_checkbox_container bx-sender-subscribe-agreement">
				<? $APPLICATION->IncludeComponent(
					"bitrix:main.userconsent.request",
					"",
					array(
						"ID" => $arParams["USER_CONSENT_ID"],
						"IS_CHECKED" => $arParams["USER_CONSENT_IS_CHECKED"],
						"AUTO_SAVE" => "Y",
						"IS_LOADED" => $arParams["USER_CONSENT_IS_LOADED"],
						"ORIGIN_ID" => "sender/sub",
						"ORIGINATOR_ID" => "",
						"REPLACE" => array(
							"button_caption" => GetMessage("subscr_form_button"),
							"fields" => array(GetMessage("subscr_form_email_title"))
						),
					)
				); ?>
			</div>
		<? endif; ?>

		<div class="bx_subscribe_submit_container">
			<button class="sender-btn btn-subscribe" id="bx_subscribe_btn_<?= $buttonId ?>"><span>
					<?= GetMessage("subscr_form_button") ?>
				</span></button>
		</div>
	</form>
	<?
	$frame->beginStub();
	?>
	<? if (isset($arResult['MESSAGE'])):
		CJSCore::Init(array("popup")); ?>
		<div id="sender-subscribe-response-cont" style="display: none;">
			<div class="bx_subscribe_response_container">
				<table>
					<tr>
						<td style="padding-right: 40px; padding-bottom: 0px;"><img
								src="<?= ($this->GetFolder() . '/images/' . ($arResult['MESSAGE']['TYPE'] == 'ERROR' ? 'icon-alert.png' : 'icon-ok.png')) ?>"
								alt=""></td>
						<td>
							<div style="font-size: 22px;">
								<?= GetMessage('subscr_form_response_' . $arResult['MESSAGE']['TYPE']) ?>
							</div>
							<div style="font-size: 16px;">
								<?= htmlspecialcharsbx($arResult['MESSAGE']['TEXT']) ?>
							</div>
						</td>
					</tr>
				</table>
			</div>
		</div>
		<script>
			BX.ready(function () {
				var oPopup = BX.PopupWindowManager.create('sender_subscribe_component', window.body, {
					autoHide: true,
					offsetTop: 1,
					offsetLeft: 0,
					lightShadow: true,
					closeIcon: true,
					closeByEsc: true,
					overlay: {
						backgroundColor: 'rgba(57,60,67,0.82)', opacity: '80'
					}
				});
				oPopup.setContent(BX('sender-subscribe-response-cont'));
				oPopup.show();
			});
		</script>
	<? endif; ?>

	<script>
		(function () {
			var btn = BX('bx_subscribe_btn_<?= $buttonId ?>');
			var form = BX('bx_subscribe_subform_<?= $buttonId ?>');

			if (!btn) {
				return;
			}

			function mailSender() {
				setTimeout(function () {
					if (!btn) {
						return;
					}

					var btn_span = btn.querySelector("span");
					var btn_subscribe_width = btn_span.style.width;
					BX.addClass(btn, "send");
					btn_span.outterHTML = "<span><i class='fa fa-check'></i> <?= GetMessage("subscr_form_button_sent") ?></span>";
					if (btn_subscribe_width) {
						btn.querySelector("span").style["min-width"] = btn_subscribe_width + "px";
					}
				}, 400);
			}

			BX.ready(function () {
				BX.bind(btn, 'click', function () {
					setTimeout(mailSender, 250);
					return false;
				});
			});

			BX.bind(form, 'submit', function () {
				btn.disabled = true;
				setTimeout(function () {
					btn.disabled = false;
				}, 2000);

				return true;
			});
		})();
	</script>
	<div class="maincontent__subcript subcript">
		<div class="subcript__inner">
			<div class="subcript__text">Подписывайтесь на нас</div>
			<form class="subcript__form" id="form-subcript" action="/local/ajax/subscribe.php" method="post"
				novalidate="novalidate">
				<input type="hidden" name="sf_RUB_ID[]" value="1">
				<div class="subcript__form-input-wrap elem-input">
					<input class="subcript__form-input elem-input__field js-valid-email" name="sf_EMAIL" type="email"
						id="subcript_email" data-msg="Некорректный email адрес" placeholder="Email" required="">
				</div>
				<input type="hidden" name="OK" value="Y">
				<button name="OK" value="Y" class="subcript__form-btn js-popup-subscription-open">
					<svg width="10" height="14" viewBox="0 0 10 14" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path
							d="M8.90625 7.53125C9.1875 7.25 9.1875 6.78125 8.90625 6.5L2.84375 0.40625C2.53125 0.125 2.0625 0.125 1.78125 0.40625L1.0625 1.125C0.78125 1.40625 0.78125 1.875 1.0625 2.1875L5.875 7L1.0625 11.8438C0.78125 12.1562 0.78125 12.625 1.0625 12.9062L1.78125 13.625C2.0625 13.9062 2.53125 13.9062 2.84375 13.625L8.90625 7.53125Z"
							fill="white"></path>
					</svg>
				</button>
			</form>
		</div>
	</div>
	<div class="subcript__inner">
		<div class="subcript__text">Подписывайтесь на нас</div>
		<form class="subcript__form" id="bx_subscribe_subform_<?= $buttonId ?>" role="form" method="post"
			action="<?= $arResult["FORM_ACTION"] ?>">
			<?= bitrix_sessid_post() ?>
			<input type="hidden" name="sender_subscription" value="add">

			<div class="subcript__form-input-wrap elem-input">
				<input class="subcript__form-input elem-input__field js-valid-email" type="email"
					name="SENDER_SUBSCRIBE_EMAIL" value="" title="<?= GetMessage("subscr_form_email_title") ?>"
					placeholder="<?= htmlspecialcharsbx(GetMessage('subscr_form_email_title')) ?>">
			</div>

			<div style="<?= (($arParams['HIDE_MAILINGS'] ?? '') <> 'Y' ? '' : 'display: none;') ?>">
				<? if (count($arResult["RUBRICS"]) > 0): ?>
					<div class="bx-subscribe-desc">
						<?= GetMessage("subscr_form_title_desc") ?>
					</div>
				<? endif; ?>
				<? foreach ($arResult["RUBRICS"] as $itemID => $itemValue): ?>
					<div class="bx_subscribe_checkbox_container">
						<input type="checkbox" name="SENDER_SUBSCRIBE_RUB_ID[]"
							id="SENDER_SUBSCRIBE_RUB_ID_<?= $itemValue["ID"] ?>" value="<?= $itemValue["ID"] ?>">
						<label
							for="SENDER_SUBSCRIBE_RUB_ID_<?= $itemValue["ID"] ?>"><?= htmlspecialcharsbx($itemValue["NAME"]) ?></label>
					</div>
				<? endforeach; ?>
			</div>

			<? if (($arParams['USER_CONSENT_USE'] ?? '') == 'Y' && $arParams['AJAX_MODE'] <> 'Y'): ?>
				<div class="bx_subscribe_checkbox_container bx-sender-subscribe-agreement">
					<? $APPLICATION->IncludeComponent(
						"bitrix:main.userconsent.request",
						"",
						array(
							"ID" => $arParams["USER_CONSENT_ID"],
							"IS_CHECKED" => $arParams["USER_CONSENT_IS_CHECKED"],
							"AUTO_SAVE" => "Y",
							"IS_LOADED" => "N",
							"ORIGIN_ID" => "sender/sub",
							"ORIGINATOR_ID" => "",
							"REPLACE" => array(
								"button_caption" => GetMessage("subscr_form_button"),
								"fields" => array(GetMessage("subscr_form_email_title"))
							),
						)
					); ?>
				</div>
			<? endif; ?>

			<div class="subcript__form-input-wrap elem-input">
				<button class="subcript__form-btn js-popup-subscription-open" id="bx_subscribe_btn_<?= $buttonId ?>">
					<svg width="10" height="14" viewBox="0 0 10 14" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path
							d="M8.90625 7.53125C9.1875 7.25 9.1875 6.78125 8.90625 6.5L2.84375 0.40625C2.53125 0.125 2.0625 0.125 1.78125 0.40625L1.0625 1.125C0.78125 1.40625 0.78125 1.875 1.0625 2.1875L5.875 7L1.0625 11.8438C0.78125 12.1562 0.78125 12.625 1.0625 12.9062L1.78125 13.625C2.0625 13.9062 2.53125 13.9062 2.84375 13.625L8.90625 7.53125Z"
							fill="white"></path>
					</svg></button>
			</div>
		</form>
		<?
		$frame->end();
		?>
	</div>