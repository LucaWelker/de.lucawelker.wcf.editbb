<div class="editBBCode {if $modedit|isset && $modedit}modEdit{/if}">
	<div class="editBBCodeHeader">
		{if $modedit|isset}
			{if $modedit}
				{if $personWhoEdited}
					Modedit{if $number} {@$number}{/if} by: {@$personWhoEdited}
				{else} 
					Modedit{if $number} {@$number}{/if}:
				{/if}
			{else}
				{if $personWhoEdited}
					Edit{if $number} {@$number}{/if} by: {@$personWhoEdited}
				{else} 
					Edit{if $number} {@$number}{/if}:
				{/if}
			{/if}
		{/if}
	</div>
	<div class="editBBCodeContent">
		{@$content}
	</div>
</div>