				<?php if( have_rows('detail') ): ?>
					<div class="detail_box">
						<?php
						while( have_rows('detail') ): the_row(); 
						?>
							<div class="detail_item">
								<span>
								<?=get_sub_field('znachenie')?>
								</span>
							</div>
						<?php endwhile; ?>
					</div>
				<?php endif; ?>